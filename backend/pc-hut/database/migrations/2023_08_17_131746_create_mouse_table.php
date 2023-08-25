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
        Schema::create('mouse', function (Blueprint $table) {
            $table->id();
            $table->integer("dpi")->nullable(false);
            $table->tinyInteger("rgb")->nullable(false);
            $table->tinyInteger("wired")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouse');
    }
};
