<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('expired_at');
            $table->string('location', 120)->default('not_set');
            $table->string('key', 120)->unique()->nullable();
            $table->string('image');
            $table->string('url');
            $table->bigInteger('clicked');
            $table->integer('order')->default(0);
            $table->string('status', 60);
            $table->boolean('active')->default(true);
            $table->boolean('active_in_api')->default(true);
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
        Schema::dropIfExists('ads');
    }
}
