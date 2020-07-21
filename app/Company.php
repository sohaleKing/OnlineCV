<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $guarded = []; //when you dont put anything means the whole field like cname website and etc
   
    public function jobs(){
        return $this->hasMany('App\Jobs'); //one to many
    }

    public function getRouteKeyName(){
        return 'slug'; 
    }

}
