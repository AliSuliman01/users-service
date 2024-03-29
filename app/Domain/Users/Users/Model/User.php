<?php

namespace App\Domain\Users\Users\Model;

use App\Domain\Users\Roles\Model\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded= [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verify()
    {
        $this->verification_token = null;
        $this->email_verified_at = now();
        $this->save();
    }
    public function arrayOfRoles()
    {
        return $this->role()->pluck('id')->toArray();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
