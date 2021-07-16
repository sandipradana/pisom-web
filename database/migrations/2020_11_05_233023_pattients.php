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
            $table->increments("id");
            $table->string("name");
            $table->string("email");
            $table->string("password", 60);
            $table->string("address");
            $table->string("phone", 15);
            $table->string("api_token", 32)->nullable();
            $table->string("firebase_token")->nullable();
            $table->date("date_of_birth");
            $table->boolean("gender");
            $table->unsignedInteger("hospital_id")->length(9);
            $table->unsignedInteger("staff_id")->length(9);
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
