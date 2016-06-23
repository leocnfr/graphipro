<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTableListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_table_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->timestamps();
            $table->text('formates');
            $table->text('papiers');
            $table->text('imprimers');
            $table->text('pelliculages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price_table_list');
    }
}
