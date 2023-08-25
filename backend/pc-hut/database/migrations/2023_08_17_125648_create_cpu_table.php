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

            $table->unsignedBigInteger('socket_id');
            $table->integer("cores")->nullable(false);
            $table->float("speed")->nullable(false);
            $table->foreign('socket_id')->references('id')->on('socket');


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
