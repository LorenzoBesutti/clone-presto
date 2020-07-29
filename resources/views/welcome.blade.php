@extends('layouts.app')
@section('content')
    

@if (session('add.create.success'))
    <div class="alert alert-success">
        Annuncio caricato correttamente
    </div>
    
@endif


@include('components.headerHome')




<div class="container mt-5 pt-5">
  <div class="row ">
    <div class="col-12 col-md-4 offset-md-4 ">
      <ul class="sfondo_link">
        <li class="nav-item dropdown lista_puntini">
          <a id="categoriesDropDown" class="nav-link dropdown-toggle text-left" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             Seleziona la categoria
          </a>

          <div class="dropdown-menu dropdown-toggle " aria-labelledby="categoriesDropDown">
              @foreach($categories as $category)
          <a href="{{route('public.adds.category', [$category->name, $category->id])}}" class="nav-link">
          {{$category->name}}</a>
              @endforeach
           </div>
      </li>
      </ul>
    </div>
  </div>
</div>

     <h1 class="text-center mt-5 pt-5"> ultimi annunci</h1>

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

<div class="container my-5">
  <div class="row justify-content-center">
    @foreach ($adds as $add)
    <div class="col-12 col-md-6 col-lg-4 mx-lg-0">
    <div class="cards">
      <div class="card">
        <div class="card__image-holder">
          <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave" />
        </div>
        <div class="card-title">
          <a href="#" class="toggle-info btn">
            <span class="left"></span>
            <span class="right"></span>
          </a>
          <h2>
              {{$add->title}}  
          </h2>
        </div>
        <div class="card-flap flap1">
          <div class="card-description">
          {{$add->description}}
         </div>
          <div class="card-flap flap2">
            <div class="card-footer">
              <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}" class="nav-link">{{$add->category->name}}</a></strong>
              <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
 


<h1>Slider | <a href="http://creaticode.com/blog">Creaticode</a></h1>
<!-- ==================================== 
Contenedor Slider 
=======================================-->
<section id="slider" class="container">
  <ul class="slider-wrapper">
  <li class="current-slide">
    <img src="http://i9.photobucket.com/albums/a88/creaticode/1_zpsc6871490.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">Diseño web</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/2_zps6ccd36bd.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">Diseño Responsive</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/4_zps611bc9f9.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">Identidad Corporativa</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dicta laudantium voluptatem minima! Dolorum tempore dolores excepturi omnis provident. Commodi quis aperiam maiores, dolore a perferendis!</p>
    </div>
  </li>

  <li>
    <img src="http://i9.photobucket.com/albums/a88/creaticode/3_zps70e4fcc5.jpg" title="" alt="">

    <div class="caption">
      <h2 class="slider-title">Desarrollo Web</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolore dignissimos laudantium.</p>
    </div>
  </li>
  </ul>
  <!-- Sombras -->
  <div class="slider-shadow"></div>
  
  <!-- Controles de Navegacion -->
  <ul id="control-buttons" class="control-buttons"></ul>
</section>


<!-- Imagenes Copyright -->
<p class="authors">
  Las imagenes usadas en esta demostracíon no son de mi propiedad. <a href="https://www.flickr.com/photos/flickr/galleries/72157645330786244/">Autores de las Imagenes</a>
</p>





@endsection