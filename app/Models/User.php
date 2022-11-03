<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'app_id',
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
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value) {
    $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $keyType='string';
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id'  =>'string',
    ];
    protected $table = 'users';

    public $incrementing=false;

    public static function boot(){
        parent::boot();
        static::creating(function($obj){
            $obj->id =Str::uuid()->toString();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(){
        return 'uuid';
    }

}
