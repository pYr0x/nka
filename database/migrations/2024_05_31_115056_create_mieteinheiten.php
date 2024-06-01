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
        Schema::create('mieteinheiten', function (Blueprint $table) {
            $table->id();
            $table->string('nr');
            $table->boolean('leerstand')->default(false);
            $table->unsignedFloat('wohnflaeche');
            $table->text('anmerkungen')->nullable();

            $table->foreignId('mietobjekt_id')->index()->constrained('mietobjekte');
            $table->timestamps();

            $table->unique(['mietobjekt_id', 'nr']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mieteinheiten');
    }
};
