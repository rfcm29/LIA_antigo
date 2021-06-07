<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kits extends Model
{
    use HasFactory;

    /**
     * Get all of the itens for the kits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itens_kit(): HasMany
    {
        return $this->hasMany(Itens_kit::class);
    }
}
