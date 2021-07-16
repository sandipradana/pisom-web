<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Journals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Sembuh / Proses Isolasi */

        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("patient_id");
            $table->unsignedInteger("staff_id");
            $table->unsignedBigInteger("patient_test_id");
            $table->boolean("status");
            $table->date("start");
            $table->date("end");
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
        Schema::drop('journals');
    }
}
