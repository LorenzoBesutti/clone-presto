@extends('layouts.app')

@section('style')

<style>

  body {
  background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}

.carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
    
@endsection
@section('content')

<div style="height: 100px"></div>
    
<div class="container my-5">
  <div class="card border-0 shadow my-5">
    <div class="card-body">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">First Slide</h3>
              <p class="lead">This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">Second Slide</h3>
              <p class="lead">This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://source.unsplash.com/O7fzqFEfLlo/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">Third Slide</h3>
              <p class="lead">This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
    </div>
    <div class="py-5">
      <div class="container">
      <h2 class="font-weight-light">{{$add->title}}</h2>
        <p class="lead">{{$add->description}}</p>
        <hr>
        <h4>Categoria: 
          <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
          <i class="float-right">Caricato il: {{$add->created_at->format('d/m/Y')}}<br>Da: {{$add->user->name}}</i></a> 
        </h4>

      </div>
    </div>
    
    <button class="btn btn-success w-25 mx-auto mb-5">Contatta il venditore</button>
    

    @auth

    @if (Auth::user()->name == $add->user->name)

    <div class="d-flex justify-content-center">
    <button class="btn btn-warning w-25 mb-5 mr-4 float-left">Modifica annuncio</button>
    <button class="btn btn-danger w-25 mb-5 float-right">Rimuovi annuncio</button>
    </div>  

  @endif
        
    @endauth




    <div class="container my-5">
      <h3 class="text-center">Altri annunci dello stesso utente:</h3>

      <div class="row justify-content-center">
       @foreach ($adds as $add)
       <div class="cards">
        <div class="col-12 col-md-6 col-lg-4">
         <div class="Card mx-3 hover_card shadow d-block mx-auto">
           <div class="card__image-holder">
             <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave" />
           </div>
           <div class="card-title">
             <a href="#" class="">
               <span class="left"></span>
               <span class="right"></span>
             </a>
             <h2 class="text-center">
                 {{$add->title}}
             </h2>
           </div>
           <div class="card-flap flap1">
             <div class="card-description">
             {{$add->description}}
            </div>
             <div class="card-flap flap2">
                 <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
                 <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
            <a href="{{route('public.detail', compact('add'))}}" class="btn btn-primary d-block mt-3">Dettaglio</a>
   
             </div>
           </div>
         </div>
   
        </div>
       </div>
        @endforeach
      </div>
    </div>
    
   {{--  <div class="container my-5">
      <h3 class="text-center text-dark">Potrebbero interessarti anche:</h3>
      <div class="row justify-content-center">
        @foreach ($adds as $add)
        <div class="cards">
          <div class="col-12 col-md-6 col-lg-4">
           <div class="Card mx-3 hover_card shadow d-block mx-auto">
             <div class="card__image-holder">
               <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave" />
             </div>
             <div class="card-title">
               <a href="#" class="">
                 <span class="left"></span>
                 <span class="right"></span>
               </a>
               <h2 class="text-center">
                   {{$add->title}}
               </h2>
             </div>
             <div class="card-flap flap1">
               <div class="card-description">
               {{$add->description}}
              </div>
               <div class="card-flap flap2">
                   <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
                   <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
              <a href="{{route('public.detail', compact('add'))}}" class="btn btn-primary d-block mt-3">Dettaglio</a>
     
               </div>
             </div>
           </div>
     
          </div>
         </div>
            
        @endforeach
      </div>
    </div> --}}


  </div>
</div>

{{-- 
<div class="container">

  
    <h1 class="my-4">Page Heading
      <small>Secondary Text</small>
    </h1>
  

    <div class="row">
  
      <div class="col-md-8">
        <img class="img-fluid" src="http://placehold.it/750x500" alt="">
      </div>
  
      <div class="col-md-4">
      <h3 class="my-3">{{$add->title}}</h3>
      <p>{{$add->description}}</p>
        <h3 class="my-3">Project Details</h3>
        <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
        <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
      </div>
  
    </div>

    <h3 class="my-4">Altre Immagini</h3>
  
    <div class="row">
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
    </div>
  
  </div> --}}








@endsection