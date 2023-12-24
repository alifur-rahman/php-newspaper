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
        Schema::create('admin_table', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('role');
            $table->string('email')->nullable();
            $table->dateTime('create_at');
        });
        DB::table('admin_table')->insert(
            array(
                'name' => 'Amin IT',
                'username' => 'admin',
                'password' => 'aminit1234',
                'role'=>'SuperAdmin',
                'email' => 'info@aminitltd.com',
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
