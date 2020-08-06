<?php

namespace App\Http\Controllers;

use App\Add;
use App\User;
use App\Contact;
use App\Category;
use App\Mail\RequestContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index(){

          $adds = Add::where('is_accepted', true)->orderBy('created_at','desc')->take(5)->get();
          

        return view('welcome', compact('adds'));
    }

    public function addsByCategory($name,$category_id){

        $category = Category::find($category_id);
        $adds = $category->adds()->where('is_accepted', true)->orderBy('created_at','desc')->paginate(6);

        return view('adds', compact('category','adds'));
    }

    public function addDetail(Add $add){
 
        $user = User::find($add->user_id);
        $adds = $user->adds()->where('id','!=', $add->id)->where('is_accepted', true)->orderBy('created_at','desc')->paginate(6);

        $announcements = Add::where('category_id', '=', $add->category->id)->where('id','!=', $add->id)->where('is_accepted', true)->paginate(6);
        
        return view('detail', compact('add','adds','user','announcements'));
    }
    public function search(Request $request){
        
        $q=$request->input('q');
        $adds=Add::search($q)->where('is_accepted', true)->orderBy('created_at','desc')->get();

        return view('search',compact('q','adds'));
    }

    public function contact(){
        return view('contact');
    }

    public function contactSubmit(Request $request){
       
        $contact = new Contact();
        $name=$request->input('name');
        $email=$request->input('mail');
        $mobile=$request->input('phone');
        $description=$request->input('description');

        $contact = compact('name','email','mobile','description');

        Mail::to($email)->send(new RequestContact($contact));

        return redirect(route('public.index'))->with('thankyou','thank-you');
    }

    public function locale($locale){

        session()->put('locale', $locale);
        return redirect()->back();
    }
}
