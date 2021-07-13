<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSameColumsFromProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->dropColumn('allow_checkout_when_out_of_stock');
            $table->dropColumn('with_storehouse_management');
            $table->dropColumn('is_variation');
            $table->dropColumn('is_searchable');
            $table->dropColumn('is_show_on_list');
            $table->dropColumn('length');
            $table->dropColumn('wide');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('barcode');
            $table->dropColumn('length_unit');
            $table->dropColumn('wide_unit');
            $table->dropColumn('height_unit');
            $table->dropColumn('weight_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('allow_checkout_when_out_of_stock')->unsigned()->default(0);
            $table->tinyInteger('with_storehouse_management')->unsigned()->default(0);
            $table->tinyInteger('is_variation')->default(0);
            $table->tinyInteger('is_searchable')->default(0);
            $table->tinyInteger('is_show_on_list')->default(0);
            $table->float('length')->nullable();
            $table->float('wide')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('barcode')->nullable();
            $table->string('length_unit', 20)->nullable();
            $table->string('wide_unit', 20)->nullable();
            $table->string('height_unit', 20)->nullable();
            $table->string('weight_unit', 20)->nullable();
        });
    }
}
