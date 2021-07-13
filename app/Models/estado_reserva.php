<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class estado_reserva extends Model
{
    protected $table = 'estado_reservas';

    use HasFactory;

    /**
     * Get all of the Reservas for the estado_reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Reservas(): HasMany
    {
        return $this->hasMany(Reserva::class, 'estado');
    }
}
