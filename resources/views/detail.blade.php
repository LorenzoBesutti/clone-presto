@extends('layouts.app')

@section('style')

<style>

  body {
  background: url('/media/detail.jpeg') no-repeat center center fixed;
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

.overflow{
  overflow:visible;
}
</style>
    
@endsection
@section('content')

<div style="height: 100px"></div>

    
<div class="container my-5">
  <div class="card border-0 shadow my-5">
    <div class="container-fluid bgCategory ">
      <div class="row-fluid col-12 headercategory">
  <p></p>
      </div>
    </div>
  
    <div class="card-body">


       
   <div class="container mt-3 ">
     <div class="row">
       <div class="col-12 col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach($add->images as $key=>$image)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{$image->getUrl(400,300)}}" class="d-block w-100" alt="...">
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon margin-custom" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon margin-custom" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
       </div>
       <div class="col-12 col-md-6 h-100 py-3">
         <p>
         <h2 class="text-left">{{$add->title}}</h2>
         </p>
         <p>
         <a class="h5 pt-2" href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
        </p>
         <p class="mt-2">$ 20,00</p>
         <p class="card-text lead">{{$add->description}}</p>
         <p class=" mb-0">Caricato da:
         <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i> 
         </p>
         @if (Auth::check() && Auth::user()->name != $add->user->name)

         <button class="btn btn-success w-50 ml-5 ml-md-0 my-5">Contatta il venditore</button>
     
         @endif
         @auth

    @if (Auth::user()->name == $add->user->name)

    <div class="d-flex justify-content-center">
    <button class="btn btn-warning w-50 my-5 mr-4 float-left">Modifica annuncio</button>
    <button class="btn btn-danger w-50 my-5 float-right">Rimuovi annuncio</button>
    </div>  

  @endif
        
    @endauth
       </div>
     </div>
   </div>

   @if ($adds->isNotEmpty())
    <div class="container">
      <h3 class="text-center">Altri annunci dello stesso utente:</h3>
    
   <div class="owl-carousel owl-theme mt-5">
     @foreach($adds as $add)
    <div class="item">
        <div class="col-12 ">
         <div class="shadow d-block mx-auto">
           
            <a href="{{route('public.detail', compact('add'))}}" class="">
             <img class="" src="{{$add->images->first()->getUrl(400,300)}}" alt="wave" />
           </a>
          
             <h2 class="text-center font-weight-bold pt-3">
                 {{$add->title}}
             </h2>
           
         </div>
   
        </div>
       </div>
      
    @endforeach 
   </div>
   @endif
  
   
    @if ($announcements->isNotEmpty())

    <div class="container mb-5 mt-3">
      <h3 class="text-center text-dark">Potrebbero interessarti anche:</h3>
      
      <div class="owl-carousel owl-theme mt-5">
        @foreach ($announcements as $announcement)
        <div class="item">
          
            <div class="col-12">
             <div class="shadow d-block mx-auto">
               
                <a href="{{route('public.detail', compact('add'))}}" class="">
                 <img class="" src="{{$announcement->images->first()->getUrl(400,300)}}" alt="wave" /></a>
               
               
                 
                 <h2 class="text-center pt-3 font-weight-bold">
                     {{$announcement->title}}
                 </h2>
               
               </div> 
             </div>
       
            </div>
           
      
        @endforeach
      
      
    </div>         
    @endif
    


 
  </div>
</div>

@endsection