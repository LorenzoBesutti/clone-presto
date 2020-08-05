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
      <h3 class="text-center"> Risultati di ricerca per: <span class="font-weight-bold h2">{{$q}}</span></h3>
    </div>
  </div>
</div>

@if($adds->isNotEmpty())
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        @foreach ($adds as $add)
        <div class="card  col-12 col-md-6 col-lg-3 my-5 mx-4 p-0 shadow-lg" style="border-radius:50px 0px; " >
        <img class="card-img-top img-fluid  position-relative" style="border-radius:50px 0px 0px 0px;" src="{{$add->images->first() ? $add->images->first()->getUrl(300,150) : 'http://placehold.it/300x150'}}" alt="Card image cap">
           <i class="fa fa-heart fa-2x text-warning position-absolute " style="margin-left: 80%; margin-top:20px;"></i> 
            <div class="card-body" style="background-color: rgba(250, 250, 3, 0.05);">
            <h5 class="card-title p-0">{{$add->title}}</h5>
             <div class="row mb-4 mt-2">
               <div class="col-6  text-secondary">
                 <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
                
               </div>
                 
               <div class="col-6 text-right text-primary font-weight-bold">
                 $ 20,00
               </div>
         
             </div>
             <div class="row">
               <div class="col-12">
                 
                 <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
               </div>
             </div>
             
             <div class="col-12 my-4 pl-0">
               <i class="fas fa-star text-warning"></i>
               <i class="fas fa-star text-warning"></i>
               <i class="fas fa-star text-warning"></i>
               <i class="fas fa-star text-warning"></i>
               <i class="fas fa-star text-light"></i>
             </div>
             <p class="card-text">{{$add->description}}</p>
             <a href="{{route('public.detail', compact('add'))}}" class="btn border-primary w-100 text-center text-primary mb-5">Scopri di più</a>
           </div>
          </div>
        @endforeach
        
    </div>
    {{-- <div class="row justify-content-center">
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