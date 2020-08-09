@extends('layouts.app')

@section('style')

<style>
  .tasti{
    width:25vh;
  }

  /* body {
  background: url('/media/detail.jpeg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
} */

      body{
        background: linear-gradient(180deg,rgb(27, 145, 180,0.4),rgba(255,255,255,1));
        background-repeat: no-repeat;
      }

/* .carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
} */

.overflow{
  overflow:visible;
}
</style>
    
@endsection
@section('content')


    
<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12">
      <div class="card rounded shadow my-5">
        <div class="bgCategory rounded-top"></div>
          <div class="card-body">


       
   <div class="container my-5 pb-0 pb-md-5">
     <div class="row">
       <div class="col-12 col-md-6 mb-5 mb-md-0">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  @foreach($add->images as $key=>$image)
                  <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                  <img src="{{$image->getUrl(400,300)}}" class="d-block w-100">
                  </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon margin-custom" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
       </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
              <div>
              <h2 class="text-left">{{$add->title}}</h2>
              <p class="h4 font-weight-bolder">€{{$add->price}}</p>
              <a class="h5 pt-2" href="{{route('public.adds.category', [$add->category->name,$add->category->id])}}">{{$add->category->name}}</a></strong>
              {{-- <p class="mt-2">$ 20,00</p> --}}
              <p class="card-text lead">{{$add->description}}</p>
              <p>Caricato da
              <i>{{$add->user->name}} il {{$add->created_at->format('d/m/Y')}}</i> 
              </p>
            </div>

              @if (Auth::check() && Auth::user()->name != $add->user->name)
              <button class="btn tasti btn-success shadow d-block mx-auto">{{__('ui.contatta')}}</button>
              @endif

              @auth

                    @if (Auth::user()->name == $add->user->name)

                    <div class="d-block d-md-flex mt-5">
                    <a href="{{route('add.edit', compact('add'))}}" 
                    class="btn btn-warning tasti text-dark shadow d-block mx-auto mb-2">{{__('ui.modifica')}}</a>
                    <form action="{{route('add.removeAdd', compact('add'))}}" method="post">
                      @method('DELETE')
                    @csrf
                    <button class="btn tasti btn-danger shadow d-block mx-auto">{{__('ui.elimina')}}</button>
                  </form>
                    </div>  

                  @endif
                        
                    @endauth
              </div>
     </div>
   </div>

   @if ($adds->isNotEmpty())
    <div class="container">
      <h3 class="text-center">{{__('ui.dallostesso')}}:</h3>
    
   <div class="owl-carousel owl-theme mt-3">
     @foreach($adds as $add)
    <div class="item">
        <div class="col-12 p-4">
         <div class="d-block mx-auto shadow">
           
            <a href="{{route('public.detail', compact('add'))}}" class="">
             <img class="" src="{{$add->images->first()->getUrl(400,300)}}"/>
           </a>
          
             <h3 class="text-center p-2">
                 {{$add->title}}
             </h3>
           
         </div>
   
        </div>
       </div>
      
    @endforeach 
   </div>
  </div>
   @endif
  
   
    @if ($announcements->isNotEmpty())

    <div class="container my-5 mt-3">
      <h3 class="text-center">{{__('ui.stessacat')}}:</h3>
      <div class="owl-carousel owl-theme mt-3">
        @foreach ($announcements as $announcement)
        <div class="item">
            <div class="col-12 p-4">
             <div class="shadow d-block mx-auto">
                <a href="{{route('public.ann.detail', compact('announcement'))}}" class="">
                 <img class="" src="{{$announcement->images->first()->getUrl(400,300)}}"/></a>
                 <h3 class="text-center p-2">
                     {{$announcement->title}}
                 </h3>
               </div> 
             </div>
            </div>
        @endforeach
      </div>    
    </div>     
    @endif

    </div>
    </div>
  </div>
</div>
</div>
@endsection