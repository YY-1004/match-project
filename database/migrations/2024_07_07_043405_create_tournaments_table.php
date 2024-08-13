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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('search_id', 6);
            $table->string('password', 255);
            $table->string('name', 20);
            $table->string('body', 100);
            $table->string('champion', 20)->nullable(true);
            $table->integer('justice_point')->default(1);
            $table->integer('attack_point')->default(3);
            $table->integer('miss_point')->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
