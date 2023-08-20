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
        Schema::create('monitor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id');
            $table->text("description")->nullable(true);
            $table->string("model", 45)->nullable(false);
            $table->float("size")->nullable(false);
            $table->float("price")->nullable(false);
            $table->tinyInteger("curved")->nullable(false);
            $table->integer("refresh_rate")->nullable(false);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor');
    }
};
