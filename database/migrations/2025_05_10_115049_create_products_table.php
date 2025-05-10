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
            $table->increments('id');
            $table->string('productname', 50)->nullable();
            $table->string('productdesc', 250)->nullable();
            $table->float('price')->nullable();
            $table->string('imagename', 50)->nullable();
            $table->string('imagename2', 50)->nullable();
            $table->string('imagename3', 50)->nullable();
            $table->string('imagename4', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->boolean('paving')->nullable();
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
