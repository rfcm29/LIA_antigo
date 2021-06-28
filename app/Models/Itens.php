<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Itens extends Model
{
    use HasFactory;

    protected $table = 'itens';

    protected $fillable = [
        'descricao',
        'modelo',
        'ref_ipvc',
        'serial_number',
        'id_kit'
    ];

    /**
     * Get the itens that owns the Itens
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kit(): BelongsTo
    {
        return $this->belongsTo(Kits::class, 'id_kit');
    }
}
