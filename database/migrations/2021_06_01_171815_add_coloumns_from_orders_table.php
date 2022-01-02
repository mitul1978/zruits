<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumnsFromOrdersTable extends Migration
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
            $table->decimal('taxable_amount')->after('user_id')->nullable();
            $table->decimal('tax')->after('taxable_amount')->nullable();

            $table->decimal('sub_total')->nullable()->change();
            $table->decimal('total_amount')->nullable()->change();
            $table->decimal('quantity')->nullable()->change();
            $table->tinyInteger('is_igst')->nullable();
            $table->tinyInteger('address_id')->nullable();
            

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
            //
        });
    }
}
