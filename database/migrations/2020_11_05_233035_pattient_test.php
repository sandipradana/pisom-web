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
            $table->unsignedInteger("patient_id");
            $table->unsignedInteger("test_type_id");
            $table->date("date");
            $table->boolean("result");
            $table->boolean("case");
            $table->boolean("journal");
            $table->string("document");
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
