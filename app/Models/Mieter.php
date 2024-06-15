<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Mieter extends Model {

    use HasFactory;

    protected $table = 'mieter';


    /**
     * @return void
     */
    protected static function booted(): void {
        static::addGlobalScope('whereIsRelatedToAuthUser', function (Builder $builder) {
            $builder->whereHas('mieter_mietvertraege.mietvertrag.mieteinheit.mietobjekt.user', function (Builder $q) {
                $q->whereId(Auth::id());
            });
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mietvertraege(): BelongsToMany {
        return $this->belongsToMany(Mietvertrag::class, 'mieter_mietvertraege');
    }
}
