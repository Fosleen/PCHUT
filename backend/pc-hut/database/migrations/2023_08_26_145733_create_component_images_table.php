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
        Schema::create('component_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('component');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_images');
    }
};
