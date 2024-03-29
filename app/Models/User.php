<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'id_member',
        'email',
        'phone_number',
        'address',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function convertions()
    {
        return $this->hasMany(Convertion::class);
    }
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }
    public function expends()
    {
        return $this->hasMany(Expend::class);
    }
    public function picks()
    {
        return $this->hasMany(Pick::class);
    }
    public function manages()
    {
        return $this->hasMany(Manage::class);
    }
    public function adjustments()
    {
        return $this->hasMany(Adjustment::class);
    }
    public function minusAdjustments()
    {
        return $this->hasMany(MinusAdjustment::class);
    }
}
