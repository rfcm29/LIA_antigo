<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemEspaco extends Model
{
    use HasFactory;

    protected $table = 'items_espaco';

    protected $fillable = [
        'descricao',
        'espaco_id'
    ];

    public function EspacoLia(): BelongsTo
    {
        return $this->belongsTo(EspacoLia::class, 'espaco_id');
    }
}
