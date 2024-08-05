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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_id')->constrained();
            $table->integer('member');
            $table->integer('number')->defailt(1);
            $table->integer('score');
            $table->integer('exscore');
            $table->integer('justice_critical');
            $table->integer('justice');
            $table->integer('attack');
            $table->integer('miss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
