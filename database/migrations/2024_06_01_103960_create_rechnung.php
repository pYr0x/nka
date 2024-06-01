<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('rechnung', function (Blueprint $table) {
            $table->id();
            $table->string('bezeichnung');
            $table->unsignedFloat('betrag');

            $table->unsignedFloat('verbrauch');
            $table->foreignId('einheit_id')
                  ->constrained('einheiten');

            $table->date('abrechnungsjahr');
            $table->string('rechnungsnummer');

            $table->foreignId('kostenstelle_id')
                  ->constrained('kostenstellen');
            $table->foreignId('rechnungssteller_id')
                  ->constrained('rechnungssteller');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('rechnung');
    }
};
