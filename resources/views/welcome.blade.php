@extends('layouts.app')
@section('content')
    

@if (session('add.create.success'))
    <div class="alert alert-success">
        Annuncio caricato correttamente
    </div>
    
@endif
@if (session('access.denied'))
    <div class="alert alert-danger">
        Accesso non consentito - solo per revisori!
    </div>
    
@endif


@include('components.headerHome')

<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <form class="inline_form" action="{{route('search')}}" method="GET">
        
      <div class="form-group">
        <h4 class="mb-4">Cerca tra i nostri annunci</h4>
         <input name="q" class="p-2 text-center padding-custom rounded-pill mr-2 shadow"   type="text" placeholder="motori, cucina..." name="search">
         <button class="py-2 px-4 rounded-custom search shadow" type="submit"><i class="fa fa-search "></i></button>
  
     </div>
    </form> 
    </div>
     <div class="col-12 col-md-6">

      <ul>

      </ul>
     </div>

    
  </div>
</div>


{{-- <div class="container mt-5 pt-5 sfondo_research">
  <div class="row mr-5 pr-5 d_flex">
    <div class="col-12 col-md-4 offset-md-4 mr-5 pr-5 inline_form">
     
        <div class="form-group ">
           <form class="inline_form" action="{{route('search')}}" method="GET">

            <input name="q" class="p-2 px-5 text-center mr-2"   type="text" placeholder="  motori,cucina..." name="search">
            <button class="py-2 px-4" type="submit"><i class="fa fa-search "></i></button>
     
          </form> 
        </div>
      <ul>
        <li class="none" >


        </li>
      
        <li class="nav-item dropdown lista_puntini sfondo_link">
          <a id="categoriesDropDown" class="nav-link dropdown-toggle text-center mr-4 seleziona_categoria" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             Seleziona la categoria <i class="fas fa-caret-right ml-5"></i>
          </a>

          <div class="dropdown-menu dropdown-toggle " aria-labelledby="categoriesDropDown">
              @foreach($categories as $category)
          <a href="{{route('public.adds.category', [$category->name, $category->id])}}" class="nav-link">
          {{$category->name}}</a>
              @endforeach
           </div>
      </li> --}}
  

      {{-- </ul>
    </div>
  </div>
</div> --}}

     <h1 class="text-center mt-5 pt-5"> </h1>

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
              <strong>Category: <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">
                {{$add->category->name}}</a></strong>
              <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
              </div>
            </div>
          </div>
        @endforeach
        
    </div>
</div>
 --}}

 <h2 class="title-hr text-center mb-5"><hr class="mr-2">ultimi annunci<hr class="ml-2"></h2>

 <div class="container">
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

  {{-- @foreach ($adds as $add)
    
    <div class="cards d-inline mx-5 px-4">

      <div class="Card my-5 mx-3 hover_card shadow">
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
  @endforeach --}}
 
 


<h1 class="text-center my-5"> le pagine più visitate </h1>
<!-- ==================================== 
Contenedor Slider 
=======================================-->
<section id="slider" class="container-slider h_costum">
  <ul class="slider-wrapper">
  <li class="current-slide">
    <img src="http://i9.photobucket.com/albums/a88/creaticode/1_zpsc6871490.jpg" title="" alt="" >

    <div class="caption">
      <h2 class="slider-title">offerta del 50% </h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/2_zps6ccd36bd.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title"> 10% cashback</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/4_zps611bc9f9.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">sfoglia il catalogo</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dicta laudantium voluptatem minima! Dolorum tempore dolores excepturi omnis provident. Commodi quis aperiam maiores, dolore a perferendis!</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/3_zps70e4fcc5.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">offerte in scadenza</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolore dignissimos laudantium.</p>
    </div>
  </li>
  </ul>
  <!-- Sombras -->
  <div class="slider-shadow"></div>
  
  <!-- Controles de Navegacion -->
  <ul id="control-buttons" class="control-buttons"></ul>
</section>








@endsection