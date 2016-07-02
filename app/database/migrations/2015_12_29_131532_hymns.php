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
        Schema::create('deceased', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->index();
            $table->string('full_name')->index();
            $table->string('gender')->index();
            $table->text('description')->index();
            $table->string('checkin_date');
            $table->string('author')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('identified')->default('0');
            $table->string('photo_path');
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
        Schema::drop('deceased');
    }
}
