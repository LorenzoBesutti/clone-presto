@extends('layouts.app')
@section('content')
    

@if (session('add.create.success'))
    <div class="alert alert-success">
        Annuncio caricato correttamente
    </div>
    
@endif


<h1 class="text-center">Benvenuto su presto</h1>


@endsection