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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->integer('orderid');
            $table->integer('productid')->nullable();
            $table->integer('amount')->nullable();
            $table->text('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
