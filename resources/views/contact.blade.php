@extends('layouts.app')

@section('style')
<style>
    body{
        background:linear-gradient(180deg,rgba(0,0,0,0.3), transparent) ,url('/media/contact.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .card-wrap{
        background-color: rgba(0, 0,0, 0.3);
        
    }
    .bordo1_password{
        border:none;
        border-bottom: 3px solid yellow !important;
        color: white;
    }

</style>
@endsection

@section('content')
    
<div class="container my-5 py-5">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card-wrap">
                <h1 class="text-center pt-4 text-white">Contattaci</h1>

                <div class="card-body py-5">
                    <form method="POST" action="{{ route('public.submit') }}">
                        @csrf

                        <div class="form-group row ">
                            <label for="password" class=" col-md-4 col-form-label text-md-right text-white"><h6>Nome e Cognome</h6></label>
                           
                            <div class="col-md-6 col">
                                <input name="name" id="password" type="text" class="bordo1_password w-75 bg-transparent"  required placeholder="Name&Surname">

                                
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="email" class=" col-md-4 col-form-label text-md-right text-white"><h6>E-mail</h6></label>
                           
                            <div class="col-md-6 col">
                                <input name="mail" id="email" type="email" class="bordo1_password w-75 bg-transparent"  placeholder="e-mail" required autocomplete="email" autofocus>
                               
                                
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="email" class=" col-md-4 col-form-label text-md-right text-white"><h6>Telefono</h6></label>
                           
                            <div class="col-md-6 col">
                                <input name="phone" id="email" type="phone" class="bordo1_password w-75 bg-transparent"  placeholder="mobile" required autocomplete="email" autofocus>
                               
                                
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="body" class=" col-md-4 col-form-label text-md-right text-white"><h6>Chiedi</h6></label>
                           
                            <div class="col-md-6 col">
                                <textarea name="description" class="inputWidth" id="description"  rows="7" required autofocus class="@error('body') is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$message}}</strong>
                                </span>
                                @enderror
                               
                                
                            </div>
                        </div>



                        

                       <button type="submit" class="btn btn-warning d-block mx-auto mt-4">Invia<i class="fas fa-caret-right ml-2"></i></button>

                                
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>












@endsection