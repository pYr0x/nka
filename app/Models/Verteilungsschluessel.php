<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Verteilungsschluessel extends Model {

    use HasFactory;

    protected $table = 'verteilungsschluessel';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kostenstellen(): HasMany {
        return $this->hasMany(Kostenstelle::class);
    }
}
