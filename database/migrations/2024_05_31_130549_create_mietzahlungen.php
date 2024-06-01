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
        Schema::create('mietzahlungen', function (Blueprint $table) {
            $table->id();
            $table->date('mieteingang');
            $table->unsignedFloat('betrag');
            $table->text('anmerkungen')->nullable();

            $table->foreignId('mietvertrag_id')->constrained('mietvertraege');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vorrauszahlungen');
    }
};
