<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mietobjekt extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mietobjekte';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mieteinheiten(): HasMany
    {
        return $this->hasMany(Mieteinheit::class);
    }
}
