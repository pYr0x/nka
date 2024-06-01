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
        Schema::create('mietvertraege', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mieteinheit_id')->index()->constrained('mieteinheiten');
            $table->date('datum');
            $table->date('beginn');
            $table->date('ende')->nullable();



            $table->timestamps();

            $table->unique(['mieteinheit_id', 'datum']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mietvertraege');
    }
};
