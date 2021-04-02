<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PattientTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_tests', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->integer("test_type_id");
            $table->date("date");
            $table->unsignedTinyInteger("result");
            $table->unsignedTinyInteger("case");
            $table->unsignedTinyInteger("journal")->default(0);
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
        Schema::drop('patient_tests');
    }
}
