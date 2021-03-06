@extends('layouts.app')
@section('content')
    

@if (session('add.create.success'))
    <div class="alert alert-success text-center">
        {{__('ui.annuncioOk')}}
    </div>
    
@endif
@if (session('update'))
    <div class="alert alert-success text-center">
        {{__('ui.uploadOk')}}
    </div>
    
@endif
@if (session('deleted'))
    <div class="alert alert-success text-center">
        {{__('ui.deleteOk')}}
    </div>
    
@endif
@if (session('access.denied'))
    <div class="alert alert-danger text-center">
      {{__('ui.accessoNo')}}

    </div>
    
@endif
@if (session('admin.access.denied'))
    <div class="alert alert-danger text-center">
      Accesso consentito al solo Admin

    </div>
    
@endif
@if (session('thankyou'))
    <div class="alert alert-warning text-center">
      {{__('ui.grazieContatto')}}

    </div>
    
@endif

<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <form class="text-center" action="{{route('search')}}" method="GET">
        
      <div class="form-group">
        <h4 class="mb-4 pr-4 ultimaClasse">{{__('ui.cerca')}}</h4>
         <input name="q" class="p-2 w-50 rounded-pill mr-2 shadow"   type="text" placeholder="motori, cucina..." name="search">
         <button class="py-2 px-4 rounded-custom search shadow" type="submit"><i class="fa fa-search "></i></button>
  
     </div>
    </form> 
    </div>
     

    
  </div>
</div>


 <h2 class="title-hr text-center mb-5"><hr class="mr-2">{{__('ui.ultimi')}}<hr class="ml-2"></h2>
 
 

<div class="container">
  <div class="row justify-content-center">
    @foreach($adds as $add)
    <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card smusso shadow mx-auto cardDmn" data-aos="flip-up">
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



  <h2 class="title-hr text-center my-5 py-5 sparisci"><hr class="mr-2">{{__('ui.articoli')}}<hr class="ml-2"></h2>

  <div class="container my-5 py-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <img src="/media/articolo.jpg" alt="articolo" class="img-fluid w-100">
      </div>
      <div class="col-12 col-md-6">
        <p class="lead">
          PRESTO MAGAZINE
        </p>
        <h3 class="text-left font-weight-bold">{{__('ui.occasione')}}</h3>
        <p class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugiat tempora ullam 
          voluptatum magnam, cum, dolorem culpa esse, qui perspiciatis sed eum iusto odio quam! Harum tenetur neque 
          voluptate cum!
        </p>
      </div>
    </div>
  </div>

  <div class="container mt-5 banner">
    <div class="row h-100 align-items-center">
      <div class="col-12 col-md-5 text-center">
        <h3 class="">{{__('ui.mobile')}}</h3>
        <a href="" class=""><img src="/media/google-play-badge.png" alt="" height="55px"></a>
        <a href="" class=""><img src="/media/appstore.png" alt="" height="40px"></a>       
      </div>
    </div>
  </div>
 
 
 <h2 class="title-hr text-center my-5 py-5 sparisci"><hr class="mr-2">{{__('ui.visitate')}}<hr class="ml-2"></h2>

<!-- ==================================== 
Contenedor Slider 
=======================================-->
<section id="slider" class="container-slider h_costum sparisci">
  <ul class="slider-wrapper">
  <li class="current-slide">
    <a href="" class=""><img src="/media/50off.jpeg" title="" alt="50off"></a>

    <div class="caption">
      <h2 class="slider-title">{{__('ui.5opercento')}} </h2>
      <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
    </div>
  </li>

  <li>
    <a href="" class=""><img src="/media/cashback.jpeg" title="" alt="cashback"></a>

    <div class="caption">
      <h2 class="slider-title"> {{__('ui.cashback')}}</h2>
      <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
    </div>
  </li>

  <li>
    <a href="" class=""><img src="/media/reso.jpeg" title="" alt="reso" width="800"></a>

    <div class="caption">
      <h2 class="slider-title">{{__('ui.reso')}}</h2>
      <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dicta laudantium voluptatem minima! Dolorum tempore dolores excepturi omnis provident. Commodi quis aperiam maiores, dolore a perferendis!</p>
    </div>
  </li>

  <li>
    <a href="" class=""><img src="/media/inscadenza.jpeg" title="" alt="inscadenza" width="900" class=""></a>

    <div class="caption">
      <h2 class="slider-title">{{__('ui.scadenza')}}</h2>
      <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolore dignissimos laudantium.</p>
    </div>
  </li>
  </ul>
  <!-- Sombras -->
  <div class="slider-shadow"></div>
  
  <!-- Controles de Navegacion -->
  <ul id="control-buttons" class="control-buttons"></ul>
</section>




@push('script')
<script>
  AOS.init();

  let navbar = document.querySelector('#navbar')
  navbar.classList.remove('bg-light')
  document.querySelectorAll('.text-bianco').forEach(e => e.classList.add('text-white'));
   document.addEventListener('scroll', () => {
	
	if (window.scrollY > 430) {
		navbar.classList.add('bg-light')
		navbar.classList.add('navbar-border')
		document.querySelectorAll('.text-bianco').forEach(e => e.classList.remove('text-white'));
	} else {
		navbar.classList.remove('bg-light')
		navbar.classList.remove('navbar-border')
		document.querySelectorAll('.text-bianco').forEach(e => e.classList.add('text-white'))
  }
  
})


</script>
@endpush
@endsection