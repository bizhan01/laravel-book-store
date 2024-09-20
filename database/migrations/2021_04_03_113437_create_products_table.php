<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('product_type');
            $table->string('product_name');
            $table->string('author')->nullable();
            $table->string('edition')->nullable();
            $table->string('publisher')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity');
            $table->integer('price');
            $table->string('image');
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
