@extends('layouts.app')
@section('style')
    <style>
       body{
           background: linear-gradient(180deg,rgba(0,0,0,0.3),transparent),url('/media/profile.-jpeg.jpeg');
           background-repeat: no-repeat;
           background-size: cover;
       }
    </style>
@endsection
@section('content')
    

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Profilo Utente</h1>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row custom ">
        <div class="col-12 col-md-6 imgProfilo">
            <img src="http://placehold.it/700x400" alt="profilePic" class="img-fluid w-75">
            <div class="row mt-5">
                <div class="col-12 ">
                    <a href="{{route('add.new')}}" class=""><button class="pulse buttonProfile bg-primary text-white">Inserisci un annuncio</button></a>
                    @if ($user->is_revisor==false)
                    <a href="{{route('public.contact')}}" class=""><button class="pulse buttonProfile bg-primary text-white">Diventa un revisore</button></a>
                    @endif
                </div>
            </div>
        </div>
    <div class="col-12 col-md-6">
        {{-- <h3 class="text-center">{{$user->name}}</h3>
        <hr>
        <h5 class="text-center">{{$user->email}}</h5>
        <h5 class="title-hr text-center mb-5 mt-5"><hr class="mr-2">Social<hr class="ml-2"></h5>
 --}}
         <div class="card bgCard cardMia">
             <div class="card-body ">
              <h3 class="card-title text-center">{{$user->name}}</h3>
              <hr>
               <p class="card-text text-center">e-Mail: {{$user->email}}</p>
             </div>
             <div class="card-footer">
               <h3 class="text-center">Social</h3>
               <hr>
               <a href="" class="" target="_blank"><i class="fa fa-facebook fa-2x text-dark ml-4"></i></a>
               <a href="" class="" target="_blank"><i class="fa fa-twitter fa-2x text-dark mx-5"></i></a>
               <a href="" class="" target="_blank"><i class="fa fa-instagram fa-2x text-dark "></i></a>
             </div>
         </div>
  </div>
       
        
    </div>
</div>

<div class="container my-md-5 py-md-5">
    <div class="row">
        <div class="col-12">
            <h2 class="title-hr text-center mb-5 text-white"><hr class="mr-2">Annunci Caricati<hr class="ml-2"></h2>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        @foreach ($adds as $add)
        {{-- <div class="col-md-7 mb-5">
            <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            </a>
          </div>
          <div class="col-md-5 my-auto">
            <h3>{{$add->title}}</h3>
          <p>{{$add->description}}</p>
          <a class="btn btn-primary" href="{{route('public.detail', compact('add'))}}">Vedi Annuncio</a>
          </div> --}}
         
          <div class="col-lg-3 col-md-4 col-6">
            <h3 class="text-center text-white">{{$add->title}}</h3>

            <a href="{{route('public.detail', compact('add'))}}" class="d-block mb-4 h-100 ">
                  <img class="img-fluid img-thumbnail sposta" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
            </a>
          </div>
        @endforeach
        
    </div>
      <!-- /.row -->
</div>


@endsection

<!-- Modal info su di me -->
