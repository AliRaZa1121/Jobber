<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function subscription(){
        return $this->hasMany('App\Subscription', 'package_id');
    }
}
