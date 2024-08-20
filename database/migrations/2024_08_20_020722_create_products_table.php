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

            $table->string('name', 500)->unique();
            $table->string('description', 1500)->nullable()->default(null);
            $table->integer('price');
            $table->integer('amount');
            $table->integer('image_path')->nullable()->default(null);
            $table->unsignedBigInteger('category_id');

            $table->timestamps();

            # add foreign key
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        # drop foreign key
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        # drop schema
        Schema::dropIfExists('products');
    }
};
