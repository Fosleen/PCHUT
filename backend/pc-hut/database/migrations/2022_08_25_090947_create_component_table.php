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
        Schema::create('component', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productable_id');
            $table->string('productable_type');
            $table->string("model", 45)->nullable(false);

            $table->float("price")->nullable(false);
            $table->float("discount")->nullable(true);
            $table->text("description")->nullable(false);
            $table->unsignedBigInteger('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component');
    }
};
