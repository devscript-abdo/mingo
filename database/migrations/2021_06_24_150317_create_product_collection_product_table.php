<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCollectionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_collection_product', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('product_collection_id')->unsigned()->index();
            $table->bigInteger('product_id')->unsigned()->index();
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
        Schema::dropIfExists('product_collection_product');
    }
}
