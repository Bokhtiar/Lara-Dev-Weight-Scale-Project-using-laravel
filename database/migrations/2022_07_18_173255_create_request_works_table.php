<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_works', function (Blueprint $table) {
            $table->id('request_work_id');
            $table->integer('user_id');
            $table->integer('driver_id');
            $table->longText('body')->nullable();
            $table->tinyInteger('driver_status')->default(0);
            $table->tinyInteger('user_status')->default(0);
            $table->tinyInteger('seller_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_works');
    }
}
