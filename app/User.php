<?php

namespace App;

use App\AdminSettings;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','contact', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles) {
        if($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }
    
    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function employee() {
        return $this->hasOne('App\Employee');
    }

    public function adminSetting() {
        return $this->hasOne(AdminSettings::class);
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPassword($token));
    }
}
