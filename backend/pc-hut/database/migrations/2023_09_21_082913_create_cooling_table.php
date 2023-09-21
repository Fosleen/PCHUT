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
        Schema::create('cooling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cooling_type_id');
            $table->foreign('cooling_type_id')->references('id')->on('cooling_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooling');
    }
};
