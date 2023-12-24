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
        Schema::create('post_table', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('lang')->default('bn');
            $table->longText('post_title');
            $table->string('headline')->default(0);
            $table->char('catagories', 100);
            $table->longText('post_description');
            $table->longText('post_thumbnail');
            $table->longText('post_tags');
            $table->char('status', 100);
            $table->string('view')->default(0);
            $table->date('public_date');
            $table->string('featured_news')->default(0);
            $table->string('most_popular')->default(0);
            $table->string('hot_news')->default(0);
            $table->string('new_trends')->default(0);
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
