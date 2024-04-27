<?php

namespace App\Models;

use App\Events\Registered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nickname',
        'email',
        'phone_number',
    ];

    protected $dispatchesEvents = [
        'created' => Registered::class,
    ];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}
