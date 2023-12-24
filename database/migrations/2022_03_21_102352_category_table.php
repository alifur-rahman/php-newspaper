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
        Schema::create('catagory_table',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('lang')->default('bn');
            $table->string('Name');
            $table->longText('description')->nullable();
            $table->char('status', 100)->default('Published');
            $table->dateTime('created_at', $precision = 0);
        });
          // Insert some stuff
          DB::table('catagory_table')->insert(
            [
                [
                    'lang' => 'en',
                    'Name' => 'National',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'en',
                    'Name' => 'Politics',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'en',
                    'Name' => 'Economy',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'en',
                    'Name' => 'International',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'bn',
                    'Name' => 'জাতীয়',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'bn',
                    'Name' => 'রাজনীতি',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'bn',
                    'Name' => 'অর্থনীতি',
                    'created_at' => $dateTime
                ],
                [
                    'lang' => 'bn',
                    'Name' => 'আন্তর্জাতিক',
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
