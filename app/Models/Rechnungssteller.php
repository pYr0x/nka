<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rechnungssteller extends Model {

    use HasFactory;

    protected $table = 'rechnungssteller';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kostenpositionen(): HasMany {
        return $this->hasMany(Kostenstelle::class);
    }

}
