<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    static public function ToBeRevisionedCount(){
        return Add::where('is_accepted', null)->count();
    }
}
