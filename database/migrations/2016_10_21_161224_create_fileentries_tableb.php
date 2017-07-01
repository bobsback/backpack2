<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTableb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('fileentries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->integer('user');
            $table->boolean('approved')->default(false);
            $table->string('gender');
            $table->string('location');
            $table->string('business_type');
            $table->string('URL');
            $table->integer('clicks')->default(0);
            
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
        Schema::drop('fileentries');
 
    }
}
