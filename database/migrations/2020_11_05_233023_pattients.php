<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pattients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("password");
            $table->string("address");
            $table->string("phone");
            $table->string("api_token", 32)->nullable();
            $table->string("firebase_token")->nullable();
            $table->date("date_of_birth");
            $table->unsignedTinyInteger("gender");
            $table->integer("hospital_id");
            $table->integer("staff_id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
