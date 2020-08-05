@extends('layouts.app')
@section('style')
<style>
/* .card-header {
    padding: 0.75rem 1.25rem !important;
    margin-bottom: 0 !important;
    background-color: rgba(250, 250, 3, 0.05) !important;
    border-bottom: 2px solid rgba(0, 0, 0, 0.125) !important;
  } */

  
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
        <h1 class="text-center">Annunci per categorie: {{$category->name}}</h1>
        </div>
    </div>
</div>
@if($adds->isNotEmpty())
<div class=" container mt-5">
     <div class="row">
       <div class="col-12 col-md-4 ">
        <h5 class=""> Filtra la tua Ricerca</h5>
        <div class="accordion bg-warning sticky-top mt-4" id="">
          <div class="card">
            <div class="card-header" id="">
              <h5 class="mb-0 ">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Selezione la tua categoria
                </button>
              </h5>
            </div>
        
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                  <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Immobili</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Giochi</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Lavoro</label>
                    </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Seleziona il Prezzo
              </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                  <label for="customRange1"></label>
                  <input type="range" class="custom-range" id="customRange1">
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col-12 col-md-8 mt-5">
        <div class="row">
          @foreach ($adds as $add)
          <div class=" col-12 col-md-6">
            <a href="#">
              <img class="img-fluid rounded my-3 my-md-0" src="{{$add->images->first() ? $add->images->first()->getUrl(300,150) : 'http://placehold.it/300x150'}}" alt="">
            </a>
          </div>
          <div class="col-12 col-md-6 card cardLuna py-2 w-100 text-left mb-5">
            <h3>{{$add->title}}<span><i class="fa fa-heart float-right text-warning"></i></span></h3>
            <p class="mb-0">$ 20,00</p>
            <div class="mb-3 mt-0">
              <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-light"></i>
              </div>
            <p>{{$add->description}}</p>
            @if (Auth::check() && Auth::user()->name != $add->user->name)
              <button class="btn btn-success">Conttata il venditore</button>
            @endif
            <p class="mt-3">
              <i class="fab fa-facebook-square fa-2x text-primary"></i>
              <i class="fab fa-instagram-square fa-2x text-primary"></i>
              <i class="fab fa-linkedin fa-2x text-primary"></i>
      
              </p>
          </div>
          @endforeach
        </div>
       </div>
     </div>
</div>
  

<div class="container">
<div class="row">
  <div class="col-12">
    
      {{$adds->links()}}
    
  </div>
</div>
</div>
@else
<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
    <div class="h2 text-center">non ci sono risultati per la categoria "{{$category->name}}"</div>
    </div>
  </div>
</div>
@endif


 








<!--non so che codice é questo!-->
{{-- </div>
</div>
</div> --}}

{{-- <div class="container my-5 py-5">
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{$adds->links()}}
        </div>
    </div>
</div> --}}






    
@endsection