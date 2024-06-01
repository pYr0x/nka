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
        Schema::create('mieter', function (Blueprint $table) {
            $table->id();
            $table->string('nachname');
            $table->string('vorname');
            $table->date('geburtsdatum');
            $table->enum('typ', ['Hauptmieter', 'Nebenmieter'])->default('Hauptmieter');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mieter');
    }
};
