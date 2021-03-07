<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];
     // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

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

    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function companies(){
        return $this->hasMany('App\Company', 'user_id');
    }

    public function companiesSubscriptions(){
        $subscriptionCount = 0;
        foreach ($this->companies as $key => $value) {
            if(count($value->subscription)){
                $subscriptionCount += count($value->subscription);
            }
        }
        return $subscriptionCount;
    }

    public function transaction(){
        return $this->hasOne('App\Transaction', 'user_id');
    }
}
