<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoKit extends Model
{
    use HasFactory;

    protected $table = "estado_kits";

    /**
     * Get all of the kits for the EstadoKit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kits(): HasMany
    {
        return $this->hasMany(Kits::class, 'estado_kit');
    }
}
