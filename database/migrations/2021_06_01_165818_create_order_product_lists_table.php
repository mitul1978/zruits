<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_lists', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('order_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->decimal('price');
            $table->integer('quantity');
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->decimal('tax_rate')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('discount_percent')->nullable();
            $table->decimal('taxable_amount');
            $table->decimal('tax');
            $table->decimal('sub_total');
            $table->decimal('volume')->nullable();
            $table->decimal('weight')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product_lists');
    }
}
