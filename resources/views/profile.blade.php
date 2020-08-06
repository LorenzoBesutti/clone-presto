@extends('layouts.app')
@section('style')
    <style>
       body{
           background: linear-gradient(180deg,rgba(0,0,0,0.3),transparent),url('/media/profile.-jpeg.jpeg');
           background-repeat: no-repeat;
           background-size: cover;
       }
    </style>
@endsection
@section('content')
    

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Profilo Utente</h1>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center ">
        <div class="col-12 col-md-6 mb-4">
            <img src="http://placehold.it/700x400" alt="profilePic" class="img-fluid w-75 mx-auto d-block">
        </div>
        <div class="col-12 col-md-6">
            <div class="card bgCard w-100">
                <div class="card-body ">
                 <h3 class="card-title text-center text-white ">{{$user->name}}</h3>
                 <hr>
                  <p class="card-text text-center text-white h5">e-Mail: {{$user->email}}</p>
                </div>
                <div class="card-footer">
                  
                  <div class="d-flex justify-content-center">
                  <a href="" class="d-inline mx-auto" target="_blank"><i class="fa fa-facebook fa-2x text-white   "></i></a>
                  <a href="" class="d-inline mx-auto" target="_blank"><i class="fa fa-twitter fa-2x text-white  "></i></a>
                  <a href="" class="d-inline mx-auto" target="_blank"><i class="fa fa-instagram fa-2x text-white  "></i></a>
                  </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            <a href="{{route('add.new')}}" class=""><button class="pulse buttonProfile bg-primary text-white">Inserisci un annuncio</button></a>
            @if ($user->is_revisor==false)
            <a href="{{route('public.contact')}}" class=""><button class="pulse buttonProfile bg-primary text-white">Diventa un revisore</button></a>
            @endif
           </div>
        </div>
    </div>
</div>

<div class="container my-md-5 py-md-5">
    <div class="row">
        <div class="col-12">
            <h2 class="title-hr text-center mb-2 mb-md-5 mt-5 mt-md-0  text-white"><hr class="mr-2">Annunci Caricati<hr class="ml-2"></h2>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        @foreach ($adds as $add)
    
         
          <div class="col-lg-3 col-md-4 col-6">
            <h3 class="text-center text-white">{{$add->title}}</h3>

            <a href="{{route('public.detail', compact('add'))}}" class="d-block mb-4 h-100 ">
                  <img class="img-fluid img-thumbnail sposta" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
            </a>
          </div>
        @endforeach
        
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{$adds->links()}}
        </div>
      </div>
</div>


@endsection


