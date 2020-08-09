@extends('layouts.app')
@section('style')
    <style>

      body{
        background: linear-gradient(180deg,rgba(27, 145, 180,0.4),rgba(255,255,255,1));
        background-repeat: no-repeat;
      }

       header {
  position: relative;
  background-color: black;
  height: 60vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  opacity: 0.5;
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
}

.profileBtn{
  width: 200px;
}

    </style>
@endsection
@section('content')
    
<header>
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="/media/presto.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="display-3">{{__('ui.profilo')}}</h1>
          
        </div>
      </div>
    </div>
</header>



<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 mb-4">
            <img src="http://placehold.it/400x300" alt="profilePic" class="img-fluid mx-auto d-block">
        </div>
        <div class="col-12 col-md-6">
            <div class="card bgCard w-100 mx-auto d-block ">
                <div class="card-body ">
                 <h3 class="card-title text-center text-dark ">{{$user->name}}</h3>
                 <hr>
                  <p class="card-text text-center text-dark h5">e-mail: {{$user->email}}</p>
                </div>
                <div class="card-footer">
                  
                  <div class="d-flex justify-content-center">
                  <a href="" class="d-inline mx-auto"><i class="fa fa-facebook fa-2x text-dark   "></i></a>
                  <a href="" class="d-inline mx-auto"><i class="fa fa-twitter fa-2x text-dark  "></i></a>
                  <a href="" class="d-inline mx-auto"><i class="fa fa-instagram fa-2x text-dark  "></i></a>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('add.new')}}" class="btn px-4 mx-auto profileBtn d-block bg-info text-white mt-5 mb-3">{{__('ui.inserisci')}}</a>
                    @if ($user->is_revisor==false)
                    <a href="{{route('public.contact')}}" class="btn px-4 mx-auto profileBtn d-block bg-success text-white">{{__('ui.diventa')}}</a>
                    @endif
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center">
            
           </div> --}}
        </div>
    </div>
</div>

<div class="container my-md-5 py-md-5">
    <div class="row">
        <div class="col-12">
            <h2 class="title-hr text-center mb-2 mb-md-5 mt-5 mt-md-0  text-dark"><hr class="mr-2">{{__('ui.caricati')}}<hr class="ml-2"></h2>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        @foreach ($adds as $add)
    
        <div class="col-12 col-md-6 col-lg-4 my-4">
          <div class="card smusso h-100 shadow mx-auto d-block"  style="width: 18rem;">
            
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
            <a href="{{route('public.detail', compact('add'))}}" class="btn btn-info text-white w-100 text-center mt-auto">{{__('ui.dettaglio')}}</a>
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


{{-- @push('script')
<script>
  
  

  let navbar = document.querySelector('#navbar')
  navbar.classList.remove('bg-light')
  document.querySelectorAll('.text-bianco').forEach(e => e.classList.add('text-white'));
   document.addEventListener('scroll', () => {
	
	if (window.scrollY > 30) {
		navbar.classList.add('bg-light')
		navbar.classList.add('navbar-border')
		document.querySelectorAll('.text-bianco').forEach(e => e.classList.remove('text-white'));
	} else {
		navbar.classList.remove('bg-light')
		navbar.classList.remove('navbar-border')
		document.querySelectorAll('.text-bianco').forEach(e => e.classList.add('text-white'))
  }
  
})

</script> --}}
@endsection


