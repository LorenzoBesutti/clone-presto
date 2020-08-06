<?php

namespace App\Jobs;

<<<<<<< HEAD
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
=======
use App\AddImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
>>>>>>> 6095107fdeb89f7bcd2ae48451cfb8a7023a1988

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

<<<<<<< HEAD
=======

    private $add_image_id;

>>>>>>> 6095107fdeb89f7bcd2ae48451cfb8a7023a1988
    /**
     * Create a new job instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        //
=======
    public function __construct($add_image_id)
    {
        $this->add_image_id = $add_image_id;
>>>>>>> 6095107fdeb89f7bcd2ae48451cfb8a7023a1988
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        //
=======
        $i = AddImage::find($this->add_image_id);

        if (!$i){
            return;
        }

        $image = file_get_contents(storage_path('/app/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);

        $imageAnnotator->close();
        $safe = $response->getSafeSearchAnnotation();

        $adult=$safe->getAdult();
        $medical=$safe->getMedical();
        $spoof=$safe->getSpoof();
        $violence=$safe->getViolence();
        $racy=$safe->getRacy();

        //echo json_encode([$adult, $medical, $spoof, $violence, $racy]);

        $likelihoodName = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE','LIKELY', 'VERY_LIKELY'
    ];

    $i->adult = $likelihoodName[$adult];
    $i->medical = $likelihoodName[$medical];
    $i->spoof = $likelihoodName[$spoof];
    $i->violence = $likelihoodName[$violence];
    $i->racy = $likelihoodName[$racy];

    $i->save();
>>>>>>> 6095107fdeb89f7bcd2ae48451cfb8a7023a1988
    }
}
