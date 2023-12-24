<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        Schema::create('social_links', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('printerest')->nullable(); 
            $table->string('vimemo')->nullable(); 
            $table->string('youtube')->nullable(); 
            $table->dateTime('update_at', $precision = 0);
        });
          // Insert some stuff
          DB::table('social_links')->insert(
            array(
                'facebook' => 'https://www.facebook.com/alifurcoder',
                'twitter' => 'https://www.twitter.com/alifurcoder',
                'update_at' => $dateTime
            )
        );
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
