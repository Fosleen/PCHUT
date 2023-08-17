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
        Schema::create('cpu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id'); //first you have to make this column so referential
            //integrity could work
            $table->integer("cores")->nullable(false);
            $table->float("speed")->nullable(false);
            $table->string("model", 45)->nullable(false);
            $table->float("price")->nullable(false);
            $table->string("socket")->nullable(false);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            //$table->foreignId('manufacturer_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpu');
    }
};
