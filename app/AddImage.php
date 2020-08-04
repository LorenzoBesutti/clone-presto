<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddImage extends Model
{
    public function add(){
      return  $this->belongsTo('App\Add');
    }
}
