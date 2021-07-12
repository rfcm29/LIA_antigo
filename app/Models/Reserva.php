<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'data_inicio',
        'data_fim',
        'descricao',
        'custo',
        'estado'
    ];

    /**
     * The kit that belong to the Reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kits()
    {
        return $this->belongsToMany(Kits::class, 'reserva_kits', 'id_reserva', 'id_kit');
    }
}
