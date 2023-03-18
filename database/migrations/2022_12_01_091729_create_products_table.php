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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->unique();
            $table->mediumText('small_description');
            $table->longText('description');
            $table->integer('cost_price');
            $table->integer('selling_price');
            $table->integer('discounted_price')->nullable();
            $table->integer('discount%')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->tinyInteger('featured');
            $table->tinyInteger('new_arrivals');
            $table->mediumText('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keywords');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
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
