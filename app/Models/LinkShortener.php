<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkShortener extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_link',
        'user_identification',
        'user_access',
        'user_ip',
        'user_agent',
        'user_link_generated'
    ];
}
