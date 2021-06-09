<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('status', 60)->default('published');
            $table->text('images')->nullable();
            $table->string('sku')->nullable();
            $table->integer('order')->unsigned()->default(0);
            $table->integer('quantity')->unsigned()->nullable();
            $table->tinyInteger('allow_checkout_when_out_of_stock')->unsigned()->default(0);
            $table->tinyInteger('with_storehouse_management')->unsigned()->default(0);
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->text('options')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->tinyInteger('is_variation')->default(0);
            $table->tinyInteger('is_searchable')->default(0);
            $table->tinyInteger('is_show_on_list')->default(0);
            $table->tinyInteger('sale_type')->default(0);
            $table->double('price')->unsigned()->nullable();
            $table->double('sale_price')->unsigned()->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->float('length')->nullable();
            $table->float('wide')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('barcode')->nullable();
            $table->string('length_unit', 20)->nullable();
            $table->string('wide_unit', 20)->nullable();
            $table->string('height_unit', 20)->nullable();
            $table->string('weight_unit', 20)->nullable();
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
        Schema::dropIfExists('products');
    }
}
