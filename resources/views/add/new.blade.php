@extends('layouts.app')
@section('content')
    




<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
            <form action="{{route('add.create')}}" method="POST">
            @csrf
            
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
</div>













@endsection