<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Zaehler extends Model {

    use HasFactory;

    protected $table = "zaehler";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zeahlerart(): HasOne {
        return $this->hasOne(Zaehlerart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mieteinheit(): HasOne {
        return $this->hasOne(Mieteinheit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zaehlerstaende(): HasMany {
        return $this->hasMany(Zaehlerstand::class);
    }
}
