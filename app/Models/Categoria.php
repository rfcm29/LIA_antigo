<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    /**
     * Get all of the kits for the Categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kits(): HasMany
    {
        return $this->hasMany(Kits::class, 'categoria');
    }
}
