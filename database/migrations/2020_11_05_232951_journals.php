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
            $table->integer("patient_id");
            $table->integer("staff_id");
            $table->integer("patient_test_id");
            $table->integer("status");
            $table->date("start");
            $table->date("end");
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
