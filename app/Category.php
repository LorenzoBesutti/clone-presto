<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function adds(){
        return $this->hasMany('App\Add');
    }
}
