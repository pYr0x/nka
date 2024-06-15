<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Mieteinheit extends Model {

    use HasFactory;

    protected $table = 'mieteinheiten';

    /**
     * @return void
     */
    protected static function booted(): void {
        static::addGlobalScope('whereIsRelatedToAuthUser', function (Builder $builder) {
            $builder->whereHas('mietobjekt.user', function (Builder $q) {
                $q->whereId(Auth::id());
            });
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mietobjekt(): BelongsTo {
        return $this->belongsTo(Mietobjekt::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mietvertraege(): HasMany {
        return $this->hasMany(Mietvertrag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zaehler(): HasMany {
        return $this->hasMany(Zaehler::class);
    }

    public function scopeLala(Builder $query, $nr): void {
        $query->where('nr', '20')
              ->orWhere('nr', $nr ?? 64);
    }
}
