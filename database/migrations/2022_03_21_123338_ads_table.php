<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_table', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ads_type'); 
            $table->string('page'); 
            $table->string('position'); 
            $table->string('position_id'); 
            $table->string('google_ad_client')->nullable(); 
            $table->string('image')->nullable(); 
            $table->string('URL')->nullable(); 
            $table->date('expair_at');
            $table->dateTime('created_at', $precision = 0);
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
};
