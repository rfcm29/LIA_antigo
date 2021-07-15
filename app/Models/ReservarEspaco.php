<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservarEspaco extends Model
{
    use HasFactory;

    protected $table = "reservar_espaco";

    protected $fillable = [
        'descricao',
        'user',
        'data_inicio',
        'data_fim',
        'preco'
    ];

    /**
     * The Espacos that belong to the ReservarEspaco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Espacos(): BelongsToMany
    {
        return $this->belongsToMany(EspacoLia::class, 'espaco_reserva', 'reserva_id', 'espaco_id');
    }

    /**
     * Get the user that owns the ReservarEspaco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }
}
