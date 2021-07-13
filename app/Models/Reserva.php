<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

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

    /**
     * Get the user that owns the Reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * Get the Estado that owns the Reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoReserva(): BelongsTo
    {
        return $this->belongsTo(estado_reserva::class, 'estado');
    }
}
