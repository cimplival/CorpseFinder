<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hymns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('hymns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('category')->index();
            $table->text('lyrics')->index();
            $table->string('slug')->nullable();
            $table->string('author')->nullable();
            $table->boolean('approved')->default('0');   
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
        Schema::drop('hymns');
    }
}
