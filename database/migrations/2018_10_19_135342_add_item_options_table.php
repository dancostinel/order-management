<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('value', 255);
//            $table->unsignedInteger('order_items_id');
//            $table->foreign('order_items_id')->references('id')->on('order_items');
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
