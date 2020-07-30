<?php

namespace App\Http\Controllers;

use App\Add;
use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){

          $adds = Add::orderBy('created_at','desc')->take(5)->get();
          

        return view('welcome', compact('adds'));
    }

    public function addsByCategory($name,$category_id){

        $category = Category::find($category_id);
        $adds = $category->adds()->orderBy('created_at','desc')->paginate(5);

        return view('adds', compact('category','adds'));
    }
}
