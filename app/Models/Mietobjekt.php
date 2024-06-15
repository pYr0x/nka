<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Mietobjekt extends Model {

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mietobjekte';

    /**
     * @return void
     */
    protected static function booted(): void {
        static::addGlobalScope('whereIsRelatedToAuthUser', function (Builder $builder) {
            $builder->whereHas('user', function (Builder $q) {
                $q->whereId(Auth::id());
            });
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mieteinheiten(): HasMany {
        return $this->hasMany(Mieteinheit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zaehlerarten(): HasMany {
        return $this->hasMany(Zaehlerart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kostenarten(): HasMany {
        return $this->hasMany(Kostenart::class);
    }

}
