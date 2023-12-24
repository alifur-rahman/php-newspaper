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
        Schema::create('meta_setting', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('meta_keyword'); 
            $table->longText('meta_description'); 
            $table->string('google_analytics_ID');
            $table->dateTime('update_at', $precision = 0);
        });
           // Insert some stuff
           DB::table('meta_setting')->insert(
            array(
                'meta_keyword' => 'Amin It, Newspaper',
                'meta_description' => 'Complete It solution ',
                'google_analytics_ID' => '1234',
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
