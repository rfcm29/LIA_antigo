<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kits extends Model
{
    use HasFactory;

    protected $table = 'kits';

    protected $fillable = [
        'descricao',
        'lia_code',
        'preco',
        'categoria',
        'estado_kit'
    ];

    /**
     * Get all of the itens for the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itens(): HasMany
    {
        return $this->hasMany(Itens::class, 'id_kit');
    }

    /**
     * Get all of the kits for the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kits(): HasMany
    {
        return $this->hasMany(Kits::class, 'id_kit');
    }

    /**
     * Get the kit that owns the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kit(): BelongsTo
    {
        return $this->belongsTo(Kits::class, 'id_kit');
    }

    /**
     * Get the categoria that owns the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'id');
    }

    /**
     * The reserva that belong to the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reserva(): BelongsToMany
    {
        return $this->belongsToMany(Reserva::class, 'reserva_kits', 'id_kit', 'id_reserva');
    }

    /**
     * Get the estadoKit that owns the Kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Estado_kit(): BelongsTo
    {
        return $this->belongsTo(EstadoKit::class, 'estado_kit', 'id');
    }
}
