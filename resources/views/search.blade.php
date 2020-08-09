@extends('layouts.app')
@section('style')
    <style>
      body{
        background: linear-gradient(180deg,rgb(27, 145, 180,0.4),rgba(255,255,255,1));
        background-repeat: no-repeat;
      }
    </style>
@endsection
@section('content')

<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
      <h3 class="text-center"> {{__('ui.ricerca')}} <span class="font-weight-bold h2">{{$q}}</span></h3>
    </div>
  </div>
</div>

@if($adds->isNotEmpty())

<div class="container">
  <div class="row justify-content-center">
    @foreach($adds as $add)
    <div class="col-12 col-md-6 col-lg-4 my-4">
    <div class="card smusso h-100 shadow mx-auto" style="width: 18rem;">
      <img src="{{$add->images->first()->getUrl(300, 150)}}" class="card-img-top smussox" alt="...">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title p-0 textCustom">{{$add->title}}</h5>
        <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>

        <i class="text-right">{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
      <div class="mb-1">
        <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-light"></i>
      </div>
      <p class="card-text bio">{{$add->description}}</p>
      <a href="{{route('public.detail', compact('add'))}}" class="btn btn-info text-white w-100 text-center  mt-auto">{{__('ui.dettaglio')}}</a>
      </div>
    </div>
  </div>
     @endforeach
  </div>
</div>

@else
<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
    <div class="h2 text-center">{{__('ui.ricercaNo')}} "{{$q}}"</div>
    </div>
  </div>
</div>
@endif 


 
@endsection