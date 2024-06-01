<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mietvertrag extends Model {

    use HasFactory;

    protected $table = 'mietvertraege';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mieteinheit(): HasOne {
        return $this->hasOne(Mieteinheit::class);
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
