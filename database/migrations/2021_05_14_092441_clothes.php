<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clothes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         // create the table
        Schema::create('clothes', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->string('condition');
            $table->decimal('price',9,0);
            $table->longText('description');
            $table->string('image');  
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
