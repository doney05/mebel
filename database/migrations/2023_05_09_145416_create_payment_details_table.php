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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('alamat_tujuans_id');
            $table->foreign('alamat_tujuans_id')->references('id')->on('alamat_tujuans');
            $table->string('products_id');
            $table->string('qty');
            $table->integer('total');
            $table->string('status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('va_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
