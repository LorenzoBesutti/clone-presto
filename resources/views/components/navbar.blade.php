<nav id="navbar" class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a> --}}
        <a class="navbar-brand p-0" href="{{route('public.index')}}">
            <h2 class="font-weight-bold  text-bianco">prest<span><img id="logo" class="iconLogo mr-1"
                        src="/media/helm.png" alt=""></span></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item ml-md-3 my-2 my-md-0">
                <a href="{{route('add.new')}}" class="btn btn-info rounded"><img src="/media/plus.png" alt="" height="24px"> {{__('ui.inserisciAnnuncio')}}</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="categoriesDropDown" class="nav-link ml-md-4 text-bianco " href="#" role="button"  aria-haspopup="true" aria-expanded="false" v-pre data-toggle="modal" data-target="#exampleModal">
                        {{__('ui.selezionaCategoria')}} <i class="fas fa-caret-right ml-2"></i>
                    </a>
          
                  
                </li>
                <div class="d-flex">
                <li class="nav-item mx-2 mx-md-0 ">
                    @include('components.locale', ['lang' => 'it' , 'nation' => 'it'])
                </li>
                <li class="nav-item mx-2 mx-md-0">
                    @include('components.locale', ['lang' => 'en' , 'nation' => 'gb'])                       
                </li>
                <li class="nav-item mx-2 mx-md-0">
                    @include('components.locale', ['lang' => 'es' , 'nation' => 'es'])                       
                </li>
                </div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                <a class="nav-link text-bianco " href="{{ route('public.contact') }}">{{__('ui.contatti')}}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-bianco " href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-bianco " href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->is_revisor)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-bianco " href="{{route('revisor.home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Revisor Home
                           <span class="badge badge-pill badge-warning">{{\App\Add::ToBeRevisionedCount()}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('revisor.home')}}"><i class="fas fa-check mr-1"></i> {{__('ui.verifica')}}</a>
                            <a class="dropdown-item" href="{{route('rejectedadds')}}"><i class="fas fa-times mr-1"></i> {{__('ui.rifiuto')}}</a>
                        </div>
                       {{-- <a href="{{route('revisor.home')}}" class="nav-link text-bianco ">
                          Revisor Home
                           <span class="badge badge-pill badge-warning">{{\App\Add::ToBeRevisionedCount()}}</span>
                        </a> --}}
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-bianco " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{route('admin.home')}}"><i class="fas fa-users-cog mr-3"></i> Admin Home</a>
                            @endif
                            <a class="dropdown-item" href="{{route('profile')}}"><i class="fas fa-user-circle mr-3"></i> {{__('ui.profilo')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                 <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body">
            @foreach($categories as $category)
            <a href="{{route('public.adds.category', [$category->name, $category->id])}}" class="nav-link text-center modalCustom">
            {{$category->name}}</a>
                @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Chiudi</button>
          
        </div>
      </div>
    </div>
  </div>

  