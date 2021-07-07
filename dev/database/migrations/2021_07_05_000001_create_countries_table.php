<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('updated');
            $table->string('name', 64)->unique('name_UNIQUE');
            $table->integer('country_id')->nullable();
            $table->string('flag', 256);
            $table->integer('cases');
            $table->integer('today_cases');
            $table->integer('deaths');
            $table->integer('today_deaths');
            $table->integer('recovered');
            $table->integer('today_recovered');
            $table->integer('active');
            $table->integer('critical');
            $table->integer('cases_per_one_million');
            $table->integer('deaths_per_one_million');
            $table->integer('tests');
            $table->integer('tests_per_one_million');
            $table->integer('population');
            $table->string('continent', 64);
            $table->integer('one_case_per_people');
            $table->integer('one_death_per_people');
            $table->integer('one_test_per_people');
            $table->integer('undefined');
            $table->double('active_per_one_million', 8, 2);
            $table->double('recovered_per_one_million', 8, 2);
            $table->double('critical_per_one_million', 8, 2);
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
        Schema::dropIfExists('countries');
    }
}
