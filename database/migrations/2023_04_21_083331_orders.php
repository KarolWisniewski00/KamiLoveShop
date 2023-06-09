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
            $table->id();
            $table->string('number')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('post');
            $table->string('street');
            $table->string('street_extra')->nullable();
            $table->string('city');
            $table->string('phone');
            $table->string('extra')->nullable();
            $table->string('products');
            $table->string('value');
            $table->string('status');
            $table->string('type');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
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
