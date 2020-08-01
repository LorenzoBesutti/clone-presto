<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Add extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];  
    use Searchable;
    public function toSearchableArray()
    {
        $category=$this->category()->pluck('name')->join(', ');
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'altro'=>'annunci',
            'category'=>$category,
            
        ];

        // Customize array...

        return $array;
    }



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
