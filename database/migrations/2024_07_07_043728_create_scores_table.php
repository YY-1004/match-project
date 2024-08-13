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
            $table->integer('score')->defailt(0);
            $table->integer('exscore')->defailt(9999);
            $table->integer('justice_critical')->defailt(0);
            $table->integer('justice')->defailt(0);
            $table->integer('attack')->defailt(0);
            $table->integer('miss')->defailt(9999);
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
