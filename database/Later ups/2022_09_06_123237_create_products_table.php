<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('cat_id')->on('categories');
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->unique();
            $table->string('category');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->string('size');
            $table->string('color');
            $table->string('image');
            $table->string('cost_price');
            $table->string('original_price');
            $table->string('selling_price');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keywords');
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
};
