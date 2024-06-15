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
        Schema::create('mietobjekte', function (Blueprint $table) {
            $table->id();
            $table->string('strasse');
            $table->string('hausnummer');
            $table->unsignedInteger('plz');
            $table->string('ort');
            $table->string('flurstueck')->nullable();
            $table->unsignedInteger('grundstuecksgroesse');
            $table->text('anmerkungen')->nullable();

            $table->foreignId('user_id')->index();

            $table->timestamps();

            $table->unique(['strasse', 'hausnummer', 'plz', 'ort', 'user_id']);
        });

        DB::statement('ALTER TABLE mietobjekte CHANGE plz plz INT(5) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mietobjekte');
    }
};
