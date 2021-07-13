<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the userType that owns the User_type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(User_type::class);
    }

    public function isAdmin() {
        return $this->user_type == '1';
    }

    /**
     * Get all of the Reservas for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Reservas(): HasMany
    {
        return $this->hasMany(Reserva::class, 'user');
    }
}
