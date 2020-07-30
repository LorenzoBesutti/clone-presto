@extends('layouts.app')
@section('content')
    

<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">Page Heading
      <small>Secondary Text</small>
    </h1>
  
    <!-- Portfolio Item Row -->
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
    <!-- /.row -->
  
    <!-- Related Projects Row -->
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
    <!-- /.row -->
  
  </div>
  <!-- /.container -->







@endsection