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
        Schema::create('shoppingcarts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->nullable();
            $table->string('payment', 50)->nullable();
            $table->string('delivery', 50)->nullable();
            $table->string('emailadress')->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 50)->nullable();
            $table->string('city', 150)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('phonenumber', 50)->nullable();
            $table->float('itemsprice')->nullable();
            $table->float('totalprice')->nullable();
            $table->string('sessionid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppingcarts');
    }
};
