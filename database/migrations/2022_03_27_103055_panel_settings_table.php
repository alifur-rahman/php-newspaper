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
        Schema::create('panel_settings', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('theme_color')->nullable();
            $table->dateTime('update_at');
        });
        DB::table('panel_settings')->insert(
            array(
                'theme_color' => '#5864bd',
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
