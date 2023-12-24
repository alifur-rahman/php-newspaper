<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_by_permission', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('role_name')->nullable();
            $table->string('modules_id')->nullable();
        });
        DB::table('role_by_permission')->insert(
            array(
                'role' => 'super-admin',
                'active_modules' => 'all'
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
