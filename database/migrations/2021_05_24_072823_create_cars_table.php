<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('brand');
            $table->integer('year');
            $table->string('distance');
            $table->enum('condition',['new', 'used']);
            $table->decimal('price',13,0);
            $table->longText('description');
            $table->string('image');
            $table->unsignedBigInteger('categories');

            $table->foreign('categories')->references('id')->on('categories');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
