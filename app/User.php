<?php

namespace deploycodeApp;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'pic' ];
    protected $hidden = ['password', 'remember_token'];

    public function posts(){
      return $this->hasMany('deploycodeApp\Post');
    }

    public function setPicAttribute($pic){
      if (!empty($pic)) {
        $new_name= 'profile.png';
        $this->attributes['pic']= $new_name;
        \Storage::disk('local')->put($new_name,\File::get($pic));
      }
    }

    public function setPasswordAttribute($valor){
      if (!empty($valor)) {
        $this->attributes['password']=\Hash::make($valor);
      }
    }
}
