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
        Schema::create('keyboard', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('switch_type_id');
            $table->tinyInteger("rgb")->nullable(false);
            $table->tinyInteger("wired")->nullable(false);
            $table->string("type", 15)->nullable(false);
            $table->string("connector", 15)->nullable(false);
            $table->foreign('switch_type_id')->references('id')->on('switch_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyboard');
    }
};
