<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rechnung extends Model {

    use HasFactory;

    protected $table = 'rechnungen';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function einheit(): BelongsTo {
        return $this->belongsTo(Einheit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rechungssteller(): BelongsTo {
        return $this->belongsTo(Rechnungssteller::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kostenstelle(): BelongsTo {
        return $this->belongsTo(Kostenstelle::class);
    }
}
