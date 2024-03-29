<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('interests', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('userid');
            $table->integer('fileid');
            
 $table->string('interest');
        
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
        Schema::drop('interests', function (Blueprint $table) {
            //
        });
    }
}
