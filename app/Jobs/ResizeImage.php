<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $path, $fileName, $w, $h;

    public function __construct($filePath, $w, $h)
    {
        $this->path= dirname($filePath);
        $this->fileName= basename($filePath);
        $this->w=$w;
        $this->h=$h;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/' . $this->path . "/crop{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
        ->crop(Manipulations::CROP_CENTER, $w,$h)
        ->watermark(base_path('resources/img/presto.png'))
        ->watermarkOpacity(100)
        ->watermarkPosition(Manipulations::POSITION_BOTTOM)
        ->watermarkHeight(20, Manipulations::UNIT_PERCENT)    // 50 percent height
        ->watermarkWidth(80, Manipulations::UNIT_PERCENT)
        ->watermarkFit(Manipulations::FIT_CONTAIN)
        ->save($destPath);
       
        
    }
}
