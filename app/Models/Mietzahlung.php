<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Mietzahlung extends Model {

    use HasFactory;

    protected $table = 'mietzahlungen';

    /**
     * @return void
     */
    protected static function booted(): void {
        static::addGlobalScope('whereIsRelatedToAuthUser', function (Builder $builder) {
            $builder->whereHas('mietvertrag.mieteinheit.mietobjekt.user', function (Builder $q) {
                $q->whereId(Auth::id());
            });
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mietvertrag(): HasOne {
        return $this->hasOne(Mietvertrag::class);
    }
}
