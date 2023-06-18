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
        Schema::create('alamat_tujuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('provinces_id')->nullable();
            $table->integer('cities_id')->nullable();
            $table->string('kurir')->nullable();
            $table->integer('ongkir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_tujuans');
    }
};
