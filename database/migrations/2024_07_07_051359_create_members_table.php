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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry1_id')->constrained('entries');
            $table->foreignId('entry2_id')->constrained('entries');
            $table->foreignId('entry3_id')->constrained('entries');
            $table->foreignId('entry4_id')->constrained('entries');
            $table->foreignId('entry5_id')->constrained('entries');
            $table->foreignId('entry6_id')->constrained('entries');
            $table->foreignId('entry7_id')->constrained('entries');
            $table->foreignId('entry8_id')->constrained('entries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
