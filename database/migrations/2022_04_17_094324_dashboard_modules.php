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
        Schema::create('dashboard_modules', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('module_name')->nullable();
            $table->string('position')->nullable();
        });
        DB::table('dashboard_modules')->insert(
            [
                [
                    'module_name' => 'News',
                    'position' => 'site_menu'
                ],
                [
                    'module_name' => 'Advertisement',
                    'position' => 'site_menu'
                ],
                [
                    'module_name' => 'SEO',
                    'position' => 'site_menu'
                ],
                [
                    'module_name' => 'Settings',
                    'position' => 'site_menu'
                ],
                [
                    'module_name' => 'Additional',
                    'position' => 'site_menu'
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
