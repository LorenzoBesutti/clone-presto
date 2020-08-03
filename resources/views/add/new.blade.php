@extends('layouts.app')
@section('style')
<style>
     .bordo2_password{
        border:none;
        border-bottom: 2px solid blue !important;
        color: black !important;
        border-radius: 0;
    }
    .bg-custom{
        background: linear-gradient(180deg,rgba(0,0,0,0.3),rgba(255,255,255,1));
    }
</style>
    
@endsection
@section('content')
    




{{-- <div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
            <form action="{{route('add.create')}}" method="POST">
            @csrf
            <div class="form-group-row">
                <label for="category" class="col-md-4 col-form-label text-md-right">Categorie</label>
                <div class="col-md-6">
                    <select name="category" id="category">
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
            <div class="form-group-row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Titolo</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" required autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group-row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Annuncio</label>
                <div class="col-md-6">
                <textarea name="description" id="description" cols="30" rows="10" required autofocus class="@error('body') is-invalid @enderror">{{old('description')}}</textarea>
                    
                    @error('description')
                         <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                         </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-success" type="submit">Crea</button>
            </form>
            </div>
        </div>
    </div>
</div> --}}




<div class="container-fluid h-100">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6 bg-custom">
        <div class="login d-flex align-items-center py-5">
          <div class="container ">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4"> {{$user->name}}, inserisci il tuo annuncio!</h3>
                <form action="{{route('add.create')}}" method="POST">
                    @csrf
                    <div class="form-group-row my-2">
                        <label for="category" class="col-md-4 col-form-label text-md-left">Categorie</label>
                        <div class="col-md-6">
                            <select name="category" id="category">
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
                        <label for="title" class="col-md-4 col-form-label text-md-left">Titolo</label>
                        <div class="col-md-6 ">
                            <input placeholder=" " type="text" class="form-control bordo2_password @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}} " required autofocus>
        
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group-row my-2">
                        <label for="description" class="col-md-4 col-form-label text-md-left">Annuncio</label>
                        <div class="col-md-6">
                        <textarea name="description" id="description" cols="40" rows="7" required autofocus class="@error('body') is-invalid @enderror">{{old('description')}}</textarea>
                            
                            @error('description')
                                 <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                 </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary ml-3 px-5" type="submit">Crea</button>
                    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>








@endsection