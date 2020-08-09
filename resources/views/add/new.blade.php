@extends('layouts.app')
@section('style')
<style>
     .bordo2_password{
        border:none;
        border-bottom: 2px solid blue !important;
        color: black !important;
        border-radius: 0;
    }
    /* .bg-custom{
        background: linear-gradient(180deg,rgba(0,0,0,0.3),rgba(255,255,255,1));
    } */
    body{
        background: linear-gradient(180deg,rgb(27, 145, 180,0.4),rgba(255,255,255,1));
        background-repeat: no-repeat;
      }
</style>
    
@endsection
@section('content')
    

<div class="container-fluid h-100">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6 bg-custom">
        <div class="login d-flex align-items-center py-5">
          <div class="container ">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4 mt-5 "> {{$user->name}}, {{__('ui.crea')}}!</h3>
              
                <form action="{{route('add.create')}}" method="POST">
                    @csrf

                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

                    <div class="form-group-row my-2">
                        <label for="category" class="col-md-4 col-form-label text-md-left">{{__('ui.cat')}}</label>
                        <div class="col-md-6">
                            <select class="inputWidth" name="category" id="category">
                                @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category') == $category->id ? 'selcted' : ''}}>{{$category->name}}
                            </option>
                                @endforeach
                            </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group-row my-2">
                        <label for="title" class="col-md-4 col-form-label text-md-left">{{__('ui.titolo')}}</label>
                        <div class="col-md-6 ">
                            <input placeholder=" " type="text" class="inputWidth bg-transparent bordo2_password @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}} " required autofocus>
        
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group-row my-2">
                        <label for="description" class="col-md-4 col-form-label text-md-left">{{__('ui.body')}}</label>
                        <div class="col-md-6">
                        <textarea class="inputWidth" name="description" id="description" {{-- cols="57"  --}}rows="7" required autofocus class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            
                            @error('description')
                                 <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                 </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label text-md-left ml-3">
                            {{__('ui.immagini')}}
                        </label>
                        <div class="col-md-12">
                            <div class="dropzone ml-3" id="drophere"></div>

                            @error('images')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-info text-white d-block mx-auto mt-4 ml-3 px-5" type="submit">{{__('ui.bottone')}}</button>
                    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>








@endsection