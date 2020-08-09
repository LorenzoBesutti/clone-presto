@extends('layouts.app')
@section('style')
    <style>
      body{
        background: linear-gradient(180deg,rgb(27, 145, 180,0.7),rgba(255,255,255,1));
        background-repeat: no-repeat;
        height: 100vh;
      }
      .centro{
        position:relative;
        left:40% !important;
      }
    </style>
@endsection
@section('content')


    
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{__('ui.rifiuto')}}</h1>
            </div>
        </div>
    </div>

    

    <div class="container my-5 py-5">
        <div class="row">
            @foreach ($adds as $add)
            <div class="col-12 col-md-6 col-lg-4 my-4">
              <div class="card smusso h-100 shadow mx-auto" style="width: 18rem;">
                <img src="{{$add->images->first() ? $add->images->first()->getUrl(300,150) : 'http://placehold.it/300x150'}}" class="card-img-top smussox" alt="...">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title p-0 textCustom my-2">{{$add->title}}</h5>
                  <a class="my-3" href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
          
                  <i class="text-right">{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i></a> 
                
                <p class="card-text bio my-3">{{$add->description}}</p>
                <form action="{{route('revisor.accept', $add->id)}}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-info mx-auto d-block text-white w-75">{{__('ui.rccett')}}</button>
              </form>
              <form action="{{route('add.delete', compact('add'))}}" method="post">
                @method('DELETE')
                  @csrf
                  <button class="btn btn-danger w-75 mx-auto d-block mt-2">{{__('ui.elimina')}}</button>
              </form>
               {{--  <a href="" class="btn btn-danger text-white w-100 text-center  mt-2" data-toggle="modal" data-target="#exampleModal2">Rimuovi</a> --}}

                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 d-flex justify-content-center">
                
                  {{$adds->links()}}
                
              </div>
            </div>
            </div>
    </div>




@endsection

