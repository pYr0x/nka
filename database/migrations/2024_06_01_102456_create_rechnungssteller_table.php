<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('rechnungssteller', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('strasse')
                  ->nullable();
            $table->string('hausnummer')
                  ->nullable();
            $table->unsignedInteger('plz')
                  ->nullable();
            $table->string('ort')
                  ->nullable();
            $table->string('iban')
                  ->nullable();
            $table->text('anmerkungen')
                  ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('rechnungssteller');
    }
};
