@extends('layouts.app')
@section('style')
    <style>
        body{
        background: linear-gradient(180deg,rgba(0,0,0,0.3),rgba(255,255,255,1));
        background-repeat: no-repeat;
        height: 100vh;
      }
    </style>
@endsection
@section('content')
    
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Annunci rifiutati</h1>
            </div>
        </div>
    </div>

    <div class="container my-5 py-5">
        <div class="row">
            @foreach ($adds as $add)
            <div class="col-md-7 mb-5">
                <a href="#">
                  <img class="img-fluid rounded mb-3 mb-md-0 w-75" src="{{$add->images->first() ? $add->images->first()->getUrl(400,300) : 'http://placehold.it/300x150'}}" alt="">
                </a>
              </div>
              <div class="col-md-5 bg-dark mb-md-5 text-white">
              <h3 class="mt-5">{{$add->title}}</h3>
                <p>{{$add->description}}</p>
                <div class="col-md-4 text-right accept">
                    <form action="{{route('revisor.accept', $add->id)}}" method="POST">
                        @csrf
                          <button type="submit" class="btn btn-success  position-sticky">Accept</button>
                    </form>
                   </div>
              </div> 
            @endforeach
          </div>
          <div class="container">
            <div class="row">
              <div class="col-12">
                
                  {{$adds->links()}}
                
              </div>
            </div>
            </div>
    </div>

@endsection