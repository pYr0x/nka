<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Zaehlerart extends Model {

    use HasFactory;

    protected $table = "zaehlerarten";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mietobjekt(): HasOne {
        return $this->hasOne(Mietobjekt::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zaehler(): HasMany {
        return $this->hasMany(Zaehler::class);
    }

}
