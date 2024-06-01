<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mieteinheit;
use App\Models\Mieter;
use App\Models\Mietkost;
use App\Models\Mietobjekt;
use App\Models\Mietvertrag;
use App\Models\Mietzahlung;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $user = User::factory()->createOne();
        $mieter = Mieter::factory(6)->create()->chunk(2);

        $mietobjekte = Mietobjekt::factory(1)->make();


        $user->mietobjekte()->saveMany($mietobjekte);

        $mietobjekte->each(function ($mietobjekt) use ($mieter) {
            $mieteinheiten = Mieteinheit::factory(3)->make();

            $mietobjekt->mieteinheiten()->saveMany($mieteinheiten);

            $mieteinheiten->each(function ($mieteinheit, int $key) use ($mieter) {
                $mietvertrag = Mietvertrag::factory()->makeOne();
                $mieteinheit->mietvertraege()->save($mietvertrag);

                $mieter[$key]->each(function($m) use ($mietvertrag) {
                    $mietvertrag->mieter()->attach($mietvertrag->id, ['mieter_id' => $m->id]);
                });

                $vertragsbeginn = Carbon::parse($mietvertrag->beginn);

                $mietkosten = Mietkost::factory()->make([
                                                            'von' => $mietvertrag->beginn,
                                                            'bis' => now(),
                                                        ]);
                $mietvertrag->mietkosten()->save($mietkosten);

                for($i = 0; $i < floor($vertragsbeginn->floatDiffInMonths('now')); $i++) {
                    $mietzahlungen = Mietzahlung::factory()->make(['mieteingang' => $vertragsbeginn->addMonths($i)->firstOfMonth(), 'betrag' => ($mietkosten->kaltmiete + $mietkosten->nebenkosten)]);
                    $mietvertrag->mietzahlungen()->save($mietzahlungen);
                }
            });
        });






        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
