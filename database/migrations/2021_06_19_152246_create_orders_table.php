<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('set null');

            $table->string('billing_email')->nullable();
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_province')->nullable();
            $table->string('billing_postalcode')->nullable();
            $table->string('billing_phone');
            $table->string('billing_name_on_card')->nullable();
            $table->unsignedBigInteger('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->string('billing_subtotal')->nullable();
            $table->string('billing_tax')->nullable();
            $table->string('billing_total');
            $table->string('payment_gateway')->default('COD');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
