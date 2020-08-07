@extends('errors::minimal')
@section('style404')
    <style>
   * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
  background: linear-gradient(180deg,rgb(27, 145, 180,0.7),rgba(255,255,255,1));

           background-repeat: no-repeat;
           background-size: cover;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 520px;
  width: 100%;
  line-height: 1.4;
  text-align: center;
}

.notfound .notfound-404 {
  position: relative;
  height: 200px;
  margin: 0px auto 20px;
  z-index: -1;
}

.notfound .notfound-404 h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 236px;
  font-weight: 200;
  margin: 0px;
  color: #211b19 !important;
  text-transform: uppercase;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound .notfound-404 h2 {
  font-family: 'Montserrat', sans-serif;
  font-size: 28px;
  font-weight: 400;
  text-transform: uppercase;
  color: #fff;
  background: rgba(0,172,193,1);
  padding: 10px 5px;
  margin: auto;
  display: inline-block;
  position: absolute;
  bottom: 0px;
  left: 0;
  right: 0;
}

.notfound a {
  font-family: 'Montserrat', sans-serif;
  display: inline-block;
  font-weight: 700;
  text-decoration: none;
  color: #000;
  text-transform: uppercase;
  padding: 13px 23px;
  background: rgba(0,172,193,1);
  font-size: 18px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound a:hover {
  color: rgba(0,172,193,1);
  background: #211b19;
}

@media only screen and (max-width: 767px) {
  .notfound .notfound-404 h1 {
    font-size: 148px;
  }
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 {
    height: 148px;
    margin: 0px auto 10px;
  }
  .notfound .notfound-404 h1 {
    font-size: 86px;
  }
  .notfound .notfound-404 h2 {
    font-size: 16px;
  }
  .notfound a {
    padding: 7px 15px;
    font-size: 14px;
  }
  
}
    </style>
@endsection
@section('code')
{{-- @section('code', '404') --}}
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
            <h2>404 - Pagina non trovata</h2>
        </div>
        <a href="{{route('public.index')}}"> Torna alla Home</a>
    </div>
</div>
@endsection
{{-- @section('message', __('Not Found')) --}}


{{-- @extends('layouts.app')

@section('content')
    





@endsection --}}