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
        Schema::create('zaehlerarten', function (Blueprint $table) {
            $table->id();
            $table->string('bezeichnung');
            $table->text('beschreibung')
                  ->nullable();
            $table->enum('zuordnung', ['Mieteinheit', 'Allgemein', 'Hauptzähler']);
            $table->foreignId('mietobjekt_id')
                  ->constrained('mietobjekte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zaehlerart');
    }
};
