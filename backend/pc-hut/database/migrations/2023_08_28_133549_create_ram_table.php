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
        Schema::create('ram', function (Blueprint $table) {
            $table->id();
            $table->integer("speed")->nullable(false);
            $table->unsignedBigInteger('ram_type_id');
            $table->foreign('ram_type_id')->references('id')->on('ram_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ram');
    }
};
