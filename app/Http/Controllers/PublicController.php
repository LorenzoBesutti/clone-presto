<?php

namespace App\Http\Controllers;

use App\Add;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){

          $adds = Add::orderBy('created_at','desc')->take(5)->get();

        return view('welcome', compact('adds'));
    }
}
