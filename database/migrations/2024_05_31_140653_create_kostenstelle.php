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
        Schema::create('kostenstellen', function (Blueprint $table) {
            $table->id();
            $table->string('bezeichnung');

            $table->foreignId('kostenart_id')->constrained('kostenarten');

            $table->foreignId('verteilungsschluessel_id')->constrained('verteilungsschluessel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kostenstellen');
    }
};
