<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSalesTable extends Migration {

    public function up()
    {
        Schema::create('sales', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('academic_year_id')->unsigned();
            $table->float('public-price');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::drop('sales');
    }
}
