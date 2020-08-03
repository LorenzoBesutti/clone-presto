@extends('layouts.app')
@section('style')
    <style>
      body{
        background: linear-gradient(180deg,rgba(0,0,0,0.3),rgba(255,255,255,1));
        height: 100vh;
      }
    </style>
@endsection
@section('content')

<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
      <h3 class="text-center"> Risultati di ricerca per: <span class="font-weight-bold h2">{{$q}}</span></h3>
    </div>
  </div>
</div>

@if($adds->isNotEmpty())
<div class="container my-5 py-5">
    <div class="row">
        @foreach ($adds as $add)
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt="fotoannuncio"></a>
              <div class="card-body">
                <h4 class="card-title">
                  {{$add->title}}
                  </h4>
                 <p class="card-text">{{$add->description}}</p>
              </div>
              <div class="card-footer d-flex justify-content-between">
              <strong>Category: <a href="{{route('public.adds.category', [$add->category->name , $add->category->id])}}">{{$add->category->name}}</a></strong>
              <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
              </div> 
            </div>
          </div>
        @endforeach
        
    </div>
   {{--  <div class="row justify-content-center">
        <div class="col-md-8">
            {{$adds->links()}}
        </div>
    </div> --}}
</div>
@else
<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
    <div class="h2 text-center">non ci sono risultati per la ricerca "{{$q}}"</div>
    </div>
  </div>
</div>
@endif 
@endsection