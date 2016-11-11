<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemkeepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemkeep',function($table)
        {
            $table->increments('ID');
            $table->string('Product');
            $table->string('Unit');
            $table->integer('Cost');
            $table->integer('Price');
            $table->string('Category');
            $table->integer('Quantity');
            $table->integer('shopID');
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
        //
    }
}
