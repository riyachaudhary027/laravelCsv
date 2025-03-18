<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('phone');
            $table->string('email');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('profile_image');  // For storing the file path of the image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
