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
use App\Models\Zaehler;
use App\Models\Zaehlerart;
use App\Models\Zaehlerstand;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $user = User::factory()
                    ->createOne();

        $mieter = Mieter::factory(6)
                        ->create()
                        ->chunk(2);

        $mietobjekte = Mietobjekt::factory(1)
                                 ->make();


        $user->mietobjekte()
             ->saveMany($mietobjekte);

        $mietobjekte->each(function (Mietobjekt $mietobjekt) use ($mieter) {
            $mieteinheiten = Mieteinheit::factory(3)
                                        ->make();

            $mietobjekt->mieteinheiten()
                       ->saveMany($mieteinheiten);

            // Zählerarten
            $zaehlerartenMieteinheit = [];
            foreach (['Warmwasser', 'Kaltwasser', 'Kaltwasser Waschraum', 'Heizung'] as $b) {
                $zaehlerartenMieteinheit[] = Zaehlerart::factory()
                                                       ->make(['bezeichnung' => $b, 'zuordnung' => 'Mieteinheit']);
            }

            $zaehlerartenMietobjekt = [];
            foreach (['Wasser', 'Warmwasser', 'Gas'] as $b) {
                $zaehlerartenMietobjekt[] = Zaehlerart::factory()
                                                      ->make(['bezeichnung' => $b, 'zuordnung' => 'Hauptzähler']);
            }

            $mietobjekt->zaehlerarten()
                       ->saveMany($zaehlerartenMieteinheit);
            $mietobjekt->zaehlerarten()
                       ->saveMany($zaehlerartenMietobjekt);


            foreach ($zaehlerartenMietobjekt as $zaehlerartMietobjekt) {
                $einbau = CarbonImmutable::parse(fake()->dateTimeThisDecade());
                $zaehler = Zaehler::factory()
                                  ->create([
                                               'einbau'        => $einbau,
                                               'zaehlerart_id' => $zaehlerartMietobjekt->getKey(),
                                           ]);


                $zaehler->zaehlerstaende()
                        ->saveMany([
                                       Zaehlerstand::factory()
                                                   ->make(['ablesedatum' => $einbau, 'zaehlerstand' => 0]),
                                       Zaehlerstand::factory()
                                                   ->make(['ablesedatum' => $einbau->addYear(), 'zaehlerstand' => fake()->randomNumber(5)]),
                                   ]);
            }

            $mieteinheiten->each(function ($mieteinheit, int $key) use ($mieter, $zaehlerartenMieteinheit) {
                $mietvertrag = Mietvertrag::factory()
                                          ->makeOne();
                $mieteinheit->mietvertraege()
                            ->save($mietvertrag);

                $mieter[$key]->each(function ($m) use ($mietvertrag) {
                    $mietvertrag->mieter()
                                ->attach($mietvertrag->id, ['mieter_id' => $m->id]);
                });

                $vertragsbeginn = CarbonImmutable::parse($mietvertrag->beginn);

                $mietkosten = Mietkost::factory()
                                      ->make([
                                                 'von' => $mietvertrag->beginn,
                                                 'bis' => now(),
                                             ]);
                $mietvertrag->mietkosten()
                            ->save($mietkosten);

                for ($i = 0; $i < floor($vertragsbeginn->floatDiffInMonths('now')); $i++) {
                    $mietzahlungen = Mietzahlung::factory()
                                                ->make(
                                                    [
                                                        'mieteingang' => $vertragsbeginn->addMonths($i)
                                                                                        ->firstOfMonth(),
                                                        'betrag'      => ($mietkosten->kaltmiete + $mietkosten->nebenkosten),
                                                    ]
                                                );
                    $mietvertrag->mietzahlungen()
                                ->save($mietzahlungen);
                }

                // add ein Zähler ne Mieteinheit und Art
                foreach ($zaehlerartenMieteinheit as $zaehlerart) {
                    $einbau = CarbonImmutable::parse(fake()->dateTimeThisDecade());
                    $zaehler = Zaehler::factory()
                                      ->create([
                                                   'einbau'         => $einbau,
                                                   'mieteinheit_id' => $mieteinheit->getKey(),
                                                   'zaehlerart_id'  => $zaehlerart->getKey(),
                                               ]);


                    $zaehler->zaehlerstaende()
                            ->saveMany([
                                           Zaehlerstand::factory()
                                                       ->make(['ablesedatum' => $einbau, 'zaehlerstand' => 0]),
                                           Zaehlerstand::factory()
                                                       ->make(['ablesedatum' => $einbau->addYear(), 'zaehlerstand' => fake()->randomNumber(5)]),
                                       ]);
                }
            });

            //            foreach (['Warmwasser', 'Kaltwasser', 'Kaltwasser Waschraum', 'Heizung'] as $b){
            //                $zaehlerartenMieteinheit = Zaehlerart::factory()
            //                          ->make(['bezeichnung' => $b, 'zuordnung' => 'Mieteinheit']);
            //                $mietobjekt->zaehlerarten()->save($zaehlerartenMieteinheit);
            //
            ////                          ->each(function ($zaehlerart) use ($mieteinheit){
            ////                              $zaehlerart->zaehler()->save(Zaehler::factory()->make(['mietob']));
            ////                          });
            //            }

        });


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
