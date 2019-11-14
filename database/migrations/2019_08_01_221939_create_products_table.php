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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->bigInteger('category_id');
            $table->string('category_name');
            $table->string('link');
            $table->string('image');
            $table->decimal('price', 8,2)->default(0);
            $table->string('version')->nullable();
            $table->string('layout')->nullable();
            $table->string('license')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('download_count')->default(0);
            // $table->foreign('category_id')->references('id')->on('product_categories');
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
