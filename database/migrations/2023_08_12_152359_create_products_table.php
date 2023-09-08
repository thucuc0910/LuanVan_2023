<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('original_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');

            $table->string('meta_title');
            $table->mediumText('meta_keyword');
            $table->mediumText('meta_description');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
