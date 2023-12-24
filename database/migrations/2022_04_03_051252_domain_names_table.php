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
        Schema::create('Domains_names', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('SERVER_PROTOCOL')->nullable();
            $table->string('Admin_uri')->nullable();
            $table->string('BN_uri')->nullable();
            $table->string('EN_uri')->nullable();
            $table->string('ePapper_uri')->nullable();
            $table->dateTime('update_at')->nullable();
            $table->dateTime('create_at');
        });
        DB::table('Domains_names')->insert(
            array(
                'SERVER_PROTOCOL'=>'http://',
                'Admin_uri' => 'null',
                'create_at' => $dateTime
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
