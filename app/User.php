<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'email_token', 'role', 'penanggung_jawab', 'universitas', 'cabang',
        'verified', 'cabang_spesifik', 'lomba_verified', 'status_lolos', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function symposiums() {
      return $this->hasMany('App\Symposium');
    }

    public function inamscs() {
      return $this->hasMany('App\INAMSC');
    }

    public function imsso() {
      return $this->hasMany('App\IMSSO');
    }

    public function imarcs() {
      return $this->hasMany('App\IMARC');
    }
}
