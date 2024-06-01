<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mietzahlung extends Model
{
    use HasFactory;

    protected $table = 'mietzahlungen';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mietvertrag(): HasOne
    {
        return $this->hasOne(Mietvertrag::class);
    }
}