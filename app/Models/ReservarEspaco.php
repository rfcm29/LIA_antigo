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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
