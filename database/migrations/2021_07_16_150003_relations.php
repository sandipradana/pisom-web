<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('days', function (Blueprint $table) {
            $table->foreign('journal_id')->references('id')->on('journals');
        });

        Schema::table('journals', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('staff_id')->references('id')->on('staffs');
            $table->foreign('patient_test_id')->references('id')->on('patient_tests');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('news_categories');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('staff_id')->references('id')->on('staffs');
        });

        Schema::table('patient_cormobids', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('cormobid_id')->references('id')->on('cormobids');
        });

        Schema::table('patient_medicines', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('medicine_id')->references('id')->on('medicines');
        });

        Schema::table('patient_tests', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('test_type_id')->references('id')->on('test_types');
        });

        Schema::table('staffs', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('symptom_checks', function (Blueprint $table) {
            $table->foreign('symptom_id')->references('id')->on('symptoms');
            $table->foreign('day_id')->references('id')->on('days');
        });

        Schema::table('todos', function (Blueprint $table) {
            $table->foreign('todo_type_id')->references('id')->on('todo_types');
            $table->foreign('todo_category_id')->references('id')->on('todo_categories');
            $table->foreign('day_id')->references('id')->on('days');
        });

        Schema::table('todo_types', function (Blueprint $table) {
            $table->foreign('todo_category_id')->references('id')->on('todo_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('days', function (Blueprint $table) {
            $table->dropForeign('journal_id');
        });

        Schema::table('journals', function (Blueprint $table) {
            $table->dropForeign('patient_id');
            $table->dropForeign('staff_id');
            $table->dropForeign('patient_test_id');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('category_id');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
            $table->dropForeign('staff_id');
        });

        Schema::table('patient_cormobids', function (Blueprint $table) {
            $table->dropForeign('patient_id');
            $table->dropForeign('cormobid_id');
        });

        Schema::table('patient_medicines', function (Blueprint $table) {
            $table->dropForeign('patient_id');
            $table->dropForeign('medicine_id');
        });

        Schema::table('patient_tests', function (Blueprint $table) {
            $table->dropForeign('patient_id');
            $table->dropForeign('test_type_id');
        });

        Schema::table('staffs', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
        });

        Schema::table('symptom_checks', function (Blueprint $table) {
            $table->dropForeign('symptom_id');
            $table->dropForeign('day_id');
        });

        Schema::table('todos', function (Blueprint $table) {
            $table->dropForeign('todo_type_id');
            $table->dropForeign('todo_category_id');
            $table->dropForeign('day_id');
        });

        Schema::table('todo_types', function (Blueprint $table) {
            $table->dropForeign('todo_category_id');
        });
    }
}
