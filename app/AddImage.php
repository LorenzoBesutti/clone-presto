<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AddImage extends Model
{
    protected $casts = [
      'labels'=>'array',
    ];

    public function add(){
      return  $this->belongsTo('App\Add');
    }

    static public function getUrlByFilePath($filePath, $w = null, $h = null){

      if(!$w && !$h) {
        return Storage::url($filePath);
      }

      $path = dirname($filePath);
      $filename = basename($filePath);

      $file = "{$path}/crop{$w}x{$h}_{$filename}";

      return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
      return AddImage::getUrlByFilePath($this->file, $w,$h);
    }
}
