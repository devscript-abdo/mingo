<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumsTypeInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
           // $table->dropColumn(['billing_subtotal', 'billing_tax', 'billing_total']);
            /******Creat the colulms  

            $table->string('billing_subtotal')->change();
            $table->string('billing_tax')->change();
            $table->string('billing_total')->change();*/
        });
    }
}
