<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Zaehlerstand extends Model {

    use HasFactory;

    protected $table = 'zaehlerstaende';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zaehler(): HasOne {
        return $this->hasOne(Zaehler::class);
    }
}
