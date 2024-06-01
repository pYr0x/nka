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
        Schema::create('zaehlerstaende', function (Blueprint $table) {
            $table->id();
            $table->date('ablesedatum');
            $table->unsignedFloat('zaehlerstand');
            $table->foreignId('zaehler_id')->constrained('zaehler');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zaehlerstaende');
    }
};
