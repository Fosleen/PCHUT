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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string("name", 30)->nullable(false);
            $table->string("surname", 30)->nullable(true);
            $table->string("address", 50)->nullable(true);
            $table->string("city", 30)->nullable(true);
            $table->string("postal", 30)->nullable(true);
            $table->string("password", 150)->nullable(false);
            $table->string("email", 45)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
