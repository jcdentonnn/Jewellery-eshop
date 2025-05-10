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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('userid')->nullable();
            $table->string('payment', 50)->nullable();
            $table->text('delivery')->nullable();
            $table->text('emailadress')->nullable();
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->text('city')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('state')->nullable();
            $table->text('phonenumber')->nullable();
            $table->float('itemsprice')->nullable();
            $table->float('totalprice')->nullable();
            $table->string('sessionid')->nullable();
            $table->timestamp('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
