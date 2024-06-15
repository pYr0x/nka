<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {

    Auth::loginUsingId(1, TRUE);
    $user = Auth::user();
    //    Gate::authorize('view', \App\Models\Mieteinheit::class);

    //    Auth::user()->can('view', \App\Models\Mieteinheit::class);


    #return User::with('mietobjekte')->find(1)->toJson(JSON_PRETTY_PRINT);
    //    $data = User::with('mietobjekte')->find(1);

    //    $data = \App\Models\Mieteinheit::where('mietobjekt_id', 1)->get();

    $data = \App\Models\Mietvertrag::find(1);

    //    $data[0]->wohnflaeche = 100;
    //    $data[0]->save();

    return $data;
});

require __DIR__.'/auth.php';
