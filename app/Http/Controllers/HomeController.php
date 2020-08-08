<?php

namespace App\Http\Controllers;

use App\Add;
use App\AddImage;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function newAdd(Request $request){
             $user=Auth::user();

             $uniqueSecret = $request->old('uniqueSecret',
             base_convert(sha1(uniqid(mt_rand())), 16, 36)
             );

        return view('add.new', ['user'=>$user] , compact('uniqueSecret'));
    }

    public function createAdd(AddRequest $request){

        
        $a = new Add();
        $a->title=$request->input('title');
        $a->description=$request->input('description');
        $a->category_id=$request->input('category');
        $a->user_id=Auth::id();
        $a->save();

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);

        

        foreach ($images as $image) {
            $i = new AddImage();

            $fileName = basename($image);
            $newFileName = "public/adds/{$a->id}/{$fileName}";
            Storage::move($image, $newFileName);

           

            $i->file = $newFileName;
            $i->add_id = $a->id;

            $i->save();

            
            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300, 150),
                new ResizeImage($i->file, 400, 300),
            ])->dispatch($i->id);        
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect('/')->with('add.create.success','ok');
    }

   /*  commento prova */
    public function userProfile(){

        $user=Auth::user();
        $adds = $user->adds()->where('is_accepted', true)->orderBy('created_at','desc')->simplePaginate(6);

        return view('profile', compact('user','adds'));
    }

    public function uploadImage(Request $request){
        
         $uniqueSecret = $request->input('uniqueSecret');
         $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

         dispatch(new ResizeImage(
             $fileName,
             120,
             120
         ));

         session()->push("images.{$uniqueSecret}", $fileName);

         return response()->json(
             [
                 'id'=>$fileName
             ]
            );

    }

    public function removeImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);
        
        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' =>AddImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        return response()->json($data);
    }

    public function deleteAdd(Add $add){
        
        $add->delete();

        return redirect('/');
    }
}

