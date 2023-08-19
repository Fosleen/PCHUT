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
        Schema::create('motherboard', function (Blueprint $table) {
            $table->id();
            $table->string("model", 45)->nullable(false);
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('socket_id');

            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            $table->foreign('socket_id')->references('id')->on('socket');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motherboard');
    }
};
