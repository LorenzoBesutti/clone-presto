@extends('layouts.app')
@section('style')
<style>

  
body{
        background: linear-gradient(180deg,rgb(27, 145, 180,0.4),rgba(255,255,255,1));
        background-repeat: no-repeat;
      }

      .ricerca{
        width:30vh;
        margin-left: 30px;
      }
    </style>
@endsection
@section('content')


<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
        <h1 class="text-center">{{__('ui.categoria')}} {{$category->name}}</h1>
        </div>
    </div>
</div>
@if($adds->isNotEmpty())

{{-- <div class=" container mt-5">
     <div class="row">
       <div class="col-12 col-md-4 ">
        <h5 class=""> {{__('ui.filtra')}}</h5>
        <div class="accordion bg-warning sticky-top mt-4" id="">
          <div class="card">
            <div class="card-header" id="">
              <h5 class="mb-0 ">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  {{__('ui.seleziona')}}
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
                  {{__('ui.selezionaPrezzo')}}
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
          <div class=" col-12 col-md-6  ">
            <a href="#">
              <img class="img-fluid rounded my-3 my-md-0 w-100 h-100" src="{{$add->images->first() ? $add->images->first()->getUrl(400,300) : 'http://placehold.it/300x150'}}" alt="">
            </a>
          </div>
          <div class="col-12 col-md-6 card cardLuna py-2 w-100 text-left h-100">
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
              <button class="btn btn-success">{{__('ui.contatta')}}</button>
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
</div> --}}
  

<div class="container">
  <div class="row">
    <div class="col-12">
      <input class="p-1 rounded-pill mb-4 shadow ricerca" onkeyup="myFunction()" type="text" placeholder="Cerca nella categoria" id="cerca">
    </div>
  </div>
  <div class="row justify-content-center">
    @foreach($adds as $add)
    <div class="col-12 col-md-6 col-lg-4 my-4 cerca">
    <div class="card smusso shadow mx-auto cardDmn">
      <img src="{{$add->images->first()->getUrl(300, 150)}}" class="card-img-top smussox" alt="...">
      
      <div class="card-body d-flex flex-column">
        <h5 class="card-title p-0 textCustom">{{$add->title}}</h5>
        <p>
          <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a>
           <span class="float-right">
             
              €{{$add->price}}
            
           </span>
        </p>
        <i class="text-left mb-2">{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i> 
      <div class="mb-1">
        <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-light"></i>
      </div>
      <p class="card-text bio">{{$add->description}}</p>
      <i class="fas fa-2x fa-sort-down ml-auto mb-3 btnLimit btnLimitDisplay" id="toggleLimit"></i>
      <a href="{{route('public.detail', compact('add'))}}" class="btn btn-info text-white w-100 text-center  mt-auto">{{__('ui.dettaglio')}}</a>
      </div>
    </div>
  </div>
     @endforeach
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 d-flex justify-content-center">
      
        {{$adds->links()}}
      
    </div>
  </div>
  </div>
@else
<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
    <div class="h2 text-center">{{__('ui.categoriaNo')}} "{{$category->name}}"</div>
    </div>
  </div>
</div>
@endif


<script>

function myFunction() {

var input, filter, td, cards, a, i;
input = document.getElementById('cerca');
filter = input.value.toUpperCase();
cards = document.getElementsByClassName('cerca');

for (i = 0; i < cards.length; i++) {
    a = cards[i].innerText;

  if (a.toUpperCase().indexOf(filter) > -1) {
    cards[i].style.display = "";
  } else {
    cards[i].style.display = "none";
  }
 }
}


</script>





    
@endsection