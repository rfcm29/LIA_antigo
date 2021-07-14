<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemsEspaço extends Model
{
    use HasFactory;

    protected $table = 'items_espaco';

    /**
     * Get the EspacoLia that owns the ItemsEspaço
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function EspacoLia(): BelongsTo
    {
        return $this->belongsTo(EspacoLia::class, 'espaco_id');
    }
}
