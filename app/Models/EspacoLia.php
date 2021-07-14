<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EspacoLia extends Model
{
    use HasFactory;

    protected $table = 'espaco_lia';

    /**
     * Get all of the Items for the EspacoLia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Items(): HasMany
    {
        return $this->hasMany(ItemsEspaço::class, 'espaco_id');
    }
}
