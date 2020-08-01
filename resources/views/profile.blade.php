@extends('layouts.app')
@section('style')
    <style>
      .btn-profile{
          background-color: dodgerblue !important;
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

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-6">
            <img src="http://placehold.it/700x400" alt="profilePic" class="img-fluid w-75">
            <div class="row mt-5 ml-5">
                <div class="col-12 ml-2">
                    <a href="{{route('add.new')}}" class="btn btn-profile w-25">nuovo annuncio</a>
                    @if ($user->is_revisor==false)
                    <a href="{{route('public.contact')}}" class="btn btn-profile w-25">Diventa Revisore</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
        <h3 class="text-center">{{$user->name}}</h3>
        <hr>
        <h5 class="text-center">{{$user->email}}</h5>
        <h5 class="title-hr text-center mb-5 mt-5"><hr class="mr-2">Social<hr class="ml-2"></h5>

        
       
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="title-hr text-center mb-5"><hr class="mr-2">Annunci Caricati<hr class="ml-2"></h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($adds as $add)
        <div class="col-md-7 mb-5">
            <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            </a>
          </div>
          <div class="col-md-5 my-auto">
            <h3>{{$add->title}}</h3>
          <p>{{$add->description}}</p>
          <a class="btn btn-primary" href="{{route('public.detail', compact('add'))}}">Vedi Annuncio</a>
          </div>
        @endforeach
        
      </div>
      <!-- /.row -->
</div>


@endsection

<!-- Modal info su di me -->
