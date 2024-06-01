<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kostenstelle extends Model {

    use HasFactory;

    protected $table = 'kostenstellen';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kostenpositionen(): HasMany {
        return $this->hasMany(Kostenposition::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function verteilungsschluessel(): BelongsTo {
        return $this->belongsTo(Verteilungsschluessel::class);
    }

}
