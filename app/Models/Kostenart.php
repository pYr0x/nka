<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kostenart extends Model {

    use HasFactory;

    protected $table = 'kostenarten';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kostenstellen(): HasMany {
        return $this->hasMany(Kostenstelle::class);
    }

}
