@extends('layouts.app')
@section('content')
    

@if (session('add.create.success'))
    <div class="alert alert-success">
        Annuncio caricato correttamente
    </div>
    
@endif


<h1 class="text-center">Benvenuto su presto</h1>




<div class="container">
  <div class="row">
    <div class="col-12">
      <ul>
        <li class="nav-item dropdown">
          <a id="categoriesDropDown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             Seleziona la categoria
          </a>

          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="categoriesDropDown">
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
              <strong>Category: <a href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">
                {{$add->category->name}}</a></strong>
              <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
              </div>
            </div>
          </div>
        @endforeach
        
    </div>
</div>


@endsection