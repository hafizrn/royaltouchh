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
            $table->string('name_english')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('code')->unique();
            $table->string('brand')->nullable();
            $table->string('measurement')->nullable();
            $table->integer('category')->default(0);
            $table->integer('type')->default(0);
            $table->integer('stock')->default(0);
            $table->date('purchase_date')->nullable();
            $table->float('buy_price')->nullable();
            $table->float('sell_price')->nullable();
            $table->float('shipping_cost')->nullable();
            $table->float('discount')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
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
