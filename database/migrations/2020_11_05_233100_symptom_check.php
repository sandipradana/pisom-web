<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SymptomCheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptom_checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("day_id");
            $table->unsignedInteger("symptom_id");
            $table->string("data")->nullable();
            $table->unsignedTinyInteger("status");
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
        Schema::drop('symptom_checks');
    }
}
