<?php

namespace App\Http\Controllers;

use App\Add;
use App\AddImage;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect('/')->with('add.create.success','ok');
    }

   /*  commento prova */
    public function userProfile(){

        $user=Auth::user();
        $adds = $user->adds()->orderBy('created_at','desc')->paginate(6);

        return view('profile', compact('user','adds'));
    }

    public function uploadImage(Request $request){
        
         $uniqueSecret = $request->input('uniqueSecret');
         $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

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
                'src' =>Storage::url($image)
            ];
        }

        return response()->json($data);
    }
}

