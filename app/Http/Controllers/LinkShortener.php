<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LinkShortener extends Controller
{
    private $identification;
    private $data = [];

    /**
     * Return All Registers
     * @return \Illuminate\Http\JsonResponse
     */
    public function linkshortener()
    {
        $fetch = (new \App\Models\LinkShortener)::all();
        foreach ($fetch as $user) {
            array_push($this->data, [
                    'link' => $user->user_link,
                    'shortener' => $user->user_identification,
                    'access' => $user->user_access,
                    'ip' => $user->user_ip,
                    'user_agent' => $user->user_agent,
                    'link_generate' => $user->user_link_generated,
                    'updated' => $user->updated_at,
                    'created' => $user->created_at
                ]
            );
        }
        return (count($this->data) != 0)
            ? Response()->json(['message' => 'success', 'status' => true, 'code' => 200, 'results' => $this->data], 200)
            : Response()->json(['message' => 'not found', 'status' => false, 'code' => 404, 'results' => $this->data], 404);
    }

    /**
     * Identification for new url
     * @param $id :: Identification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function link($id)
    {
        if ($id == $this->verify($id, 'user_identification')) {
            $LS = $this->verify($id);
            $LS->user_access += 1;
            $LS->user_ip = \Request::ip();
            $LS->user_agent = \Request::userAgent();
            $LS->save();
            return Redirect::to($this->verify($id, 'user_link'));
        } else {
            return Response()->json(['message' => 'not found', 'status' => false, 'code' => 404], 404);
        }
    }

    /**
     * Save register
     * @param Request $rq :: Post
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $rq)
    {
        if ($this->verifyIdentification($rq->identification) != $this->verify($rq->identification, 'user_identification')) {

            $LS = new \App\Models\LinkShortener();
            $LS->user_link = $rq->link;
            $LS->user_identification = $this->identification;
            $LS->user_access = 0;
            $LS->user_link_generated = env('APP_URL')."api/link/{$this->identification}";
            $LS->save();

            return Response()->json(['message' => 'created', 'status' => true, 'code' => 201], 201);
        } else {
            return Response()->json(['message' => 'forbidden :: record already exists, try another word', 'status' => false, 'code' => 403], 403);
        }
    }

    /**
     * Word identification and generation of another one if needed
     * @param $rq :: Word identification
     * @return string
     */
    private function verifyIdentification($rq)
    {
        return (empty($rq))
            ? $this->identification = sprintf('%07X', mt_rand(0, 0xFFFFFFF))
            : $this->identification = $rq;
    }

    /**
     * Verify registers on the database
     * @param $q :: Search word
     * @param null $identification :: Identification
     * @return |null
     */
    private function verify($q, $identification = null) {
        $result = (new \App\Models\LinkShortener)::where('user_identification', "{$q}")->first();
        return ($result == NULL)
            ? $result
            : ((empty($identification))
                ? $result
                : $result->$identification);
    }
}
