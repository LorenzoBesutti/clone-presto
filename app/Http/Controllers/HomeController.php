<?php

namespace App\Http\Controllers;

use App\Add;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use Illuminate\Support\Facades\Auth;

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

    public function newAdd(){
             $user=Auth::user();
        return view('add.new', ['user'=>$user]);
    }

    public function createAdd(AddRequest $request){

        
        $a = new Add();
        $a->title=$request->input('title');
        $a->description=$request->input('description');
        $a->category_id=$request->input('category');
        $a->user_id=Auth::id();
        $a->save();

        return redirect('/')->with('add.create.success','ok');
    }

   /*  commento prova */
    public function userProfile(){

        $user=Auth::user();
        $adds = $user->adds()->orderBy('created_at','desc')->get();

        return view('profile', compact('user','adds'));
    }
}
