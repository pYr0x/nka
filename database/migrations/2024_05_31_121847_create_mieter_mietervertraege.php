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
        Schema::create('mieter_mietvertraege', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mieter_id')->constrained('mieter')->onDelete('cascade');
            $table->foreignId('mietvertrag_id')->constrained('mietvertraege')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mieter_mietervertraege');
    }
};
