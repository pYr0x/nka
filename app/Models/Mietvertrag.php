<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Mietvertrag extends Model {

    use HasFactory;

    protected $table = 'mietvertraege';

    /**
     * @return void
     */
    protected static function booted(): void {
        static::addGlobalScope('whereIsRelatedToAuthUser', function (Builder $builder) {
            $builder->whereHas('mieteinheit.mietobjekt.user', function (Builder $q) {
                $q->whereId(Auth::id());
            });
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mieteinheit(): BelongsTo {
        return $this->belongsTo(Mieteinheit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mietzahlungen(): HasMany {
        return $this->hasMany(Mietzahlung::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mieter(): BelongsToMany {
        return $this->belongsToMany(Mieter::class, 'mieter_mietvertraege');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mietkosten(): HasMany {
        return $this->hasMany(Mietkost::class);
    }
}
