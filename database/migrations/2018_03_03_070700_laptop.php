<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Laptop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptop', function(Blueprint $table){
 $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->string('description');
            $table->integer('amount');
            $table->integer('catalog_id')->unsigned();
            $table->timestamps();
            $table->foreign('catalog_id')->references('id')->on('catalog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptop');
    }
}
