<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddImage extends Model
{
    public function add(){
        $this->belongsTo('App\Add');
    }
}
