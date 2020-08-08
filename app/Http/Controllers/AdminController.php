<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.revisor');
    }

    public function index(){
 
        $users=User::where('is_admin','<>', true)->get();
       

         return view('admin.home', compact('users'));
 
     }

     public function makeRevisor($id){

        $user=User::where('id', '=', e($id))->first();
        if($user){
            $user->is_revisor = 1;
            $user->save();
            return redirect()->back();

        }
        

     }

     public function removeRevisor($id){

        $user=User::where('id', '=', e($id))->first();
        if($user){
            $user->is_revisor = 0;
            $user->save();
            return redirect()->back();

        }
        

     }





}
