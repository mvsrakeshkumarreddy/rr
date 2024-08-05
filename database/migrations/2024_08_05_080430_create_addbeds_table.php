<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateAddbedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('addbeds', function (Blueprint $table) 
        {
            $table->id();
            $table->string('division')->nullable();
            $table->string('station')->nullable();
            $table->string('floor')->nullable();
            $table->string('bedno')->nullable();
            $table->string('addedby')->nullable();
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
        Schema::dropIfExists('addbeds');
    }
}
