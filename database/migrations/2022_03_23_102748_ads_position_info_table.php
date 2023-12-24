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
        Schema::create('ads_position_info', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('page_name'); 
            $table->string('position_name');
            $table->string('position_id');
            $table->dateTime('created_at', $precision = 0);
        });
         // Insert some stuff
         DB::table('ads_position_info')->insert(
            [
                [
                    'page_name' => 'Header',
                    'position_name' => 'Header ads position one (01)',
                    'position_id'=> 'HDP1',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position one (01)',
                    'position_id'=> 'HP1',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position two (02)',
                    'position_id'=> 'HP2',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position three (03)',
                    'position_id'=> 'HP3',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position four (04)',
                    'position_id'=> 'HP4',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home Page ads position five (05)',
                    'position_id'=> 'HP5',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position six (06)',
                    'position_id'=> 'HP6',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position seven (07)',
                    'position_id'=> 'HP7',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position eight (08)',
                    'position_id'=> 'HP8',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position nine (09)',
                    'position_id'=> 'HP9',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position ten (10)',
                    'position_id'=> 'HP10',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position eleven (11)',
                    'position_id'=> 'HP11',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'Home Page',
                    'position_name' => 'Home page ads position twelve (12)',
                    'position_id'=> 'HP12',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'News List page',
                    'position_name' => 'News List page ads position one (01)',
                    'position_id'=> 'NL1',
                    'created_at' => $dateTime
                ],

                [
                    'page_name' => 'News Details Page',
                    'position_name' => 'News Details Page ads position one (01)',
                    'position_id'=> 'ND1',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'News Details Page',
                    'position_name' => 'News Details Page ads position two (02)',
                    'position_id'=> 'ND2',
                    'created_at' => $dateTime
                ],
                [
                    'page_name' => 'News Details Page',
                    'position_name' => 'News Details Page ads position three (03)',
                    'position_id'=> 'ND3',
                    'created_at' => $dateTime
                ]
            ]
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
