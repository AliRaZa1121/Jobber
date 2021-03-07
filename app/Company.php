<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function subscription(){
        return $this->hasMany('App\Subscription', 'company_id');
    }
}
