<?php

namespace App\Models;

use App\Events\RequestedLogin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'email',
        'valid_until',
    ];

    protected $dispatchesEvents = [
        'created' => RequestedLogin::class,
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($table) {
            $table->value = str()->random(40);
            $table->valid_until = now()->addHours(config('constants.login_token_lifespan_days'));
        });
    }

    public function createdToday(string $email): Collection
    {
        return $this->whereEmail($email)->whereCreatedAtDay(now()->day)->get();
    }

    public function canCreateToday(string $email): bool
    {
        return $this->createdToday($email)->count() < config('login_token_daily_limit');
    }

    public function invalidateAllOthers(string $email): null
    {
        return $this->whereEmail($email)->update(['valid_until' => now()]);
    }
}
