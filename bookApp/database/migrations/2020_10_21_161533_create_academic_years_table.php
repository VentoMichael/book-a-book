<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicYearsTable extends Migration {

    public function up()
    {
        Schema::create('academic_years', function(Blueprint $table) {
            $table->increments('id');
            $table->date('starting_year');
            $table->date('ending_year');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('academic_years');
    }
}
