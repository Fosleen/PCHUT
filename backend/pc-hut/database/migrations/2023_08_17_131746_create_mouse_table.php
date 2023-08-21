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
            $table->unsignedBigInteger('manufacturer_id'); //first you have to make this column so referential
            $table->text("description")->nullable(true);
            $table->string("model", 45)->nullable(false);
            $table->integer("dpi")->nullable(false);
            $table->tinyInteger("rgb")->nullable(false);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
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
