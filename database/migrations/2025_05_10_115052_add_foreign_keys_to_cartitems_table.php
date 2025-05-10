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
        Schema::table('cartitems', function (Blueprint $table) {
            $table->foreign(['cartid'], 'cartid')->references(['id'])->on('shoppingcarts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['productid'], 'productid')->references(['id'])->on('products')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cartitems', function (Blueprint $table) {
            $table->dropForeign('cartid');
            $table->dropForeign('productid');
        });
    }
};
