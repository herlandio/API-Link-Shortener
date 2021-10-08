<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkShortenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_shorteners', function (Blueprint $table) {
            $table->id();
            $table->string('user_link');
            $table->string('user_identification')->unique();
            $table->integer('user_access');
            $table->string('user_ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('user_link_generated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_shorteners');
    }
}
