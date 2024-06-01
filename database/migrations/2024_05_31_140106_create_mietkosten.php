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
        Schema::create('mietkosten', function (Blueprint $table) {
            $table->id();
            $table->date('von');
            $table->date('bis');

            $table->unsignedFloat('kaltmiete');
            $table->unsignedFloat('stellplatz')->nullable();
            $table->unsignedFloat('sonstiges')->nullable();
            $table->unsignedFloat('nebenkosten');

            $table->foreignId('mietvertrag_id')->constrained('mietvertraege');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mietkosten');
    }
};
