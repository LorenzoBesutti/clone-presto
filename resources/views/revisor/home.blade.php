@extends('layouts.app')

@section('content')


@if($add)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">Annuncio # {{$add->id}}</div>

            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-2">
                        <h3>Utente</h3>
                    </div>
                    <div class="col-md-10">
                        # {{$add->user->id}},
                        {{$add->user->name}},
                        {{$add->user->email}},
                    </div>
                </div>

                <hr>


                <div class="row">
                    <div class="col-md-2">
                        <h3>Titolo<h3>
                    </div>
                    <div class="col-md-10">
                        {{$add->title}}
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-2">
                        <h3>Descrizione</h3>
                    </div>
                    <div class="col-md-10">
                        {{$add->description}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <h3>Immagini</h3>
                    </div>
                    <div class="col-md-10">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/300x150.png" alt="" class="rounded">
                            </div>
                            <div class="col-md-8">
                                ... ... ...
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/300x150.png" alt="" class="rounded">
                            </div>
                            <div class="col-md-8">
                                ... ... ...
                            </div>
                        </div>
                    </div>
                </div>
           </div>


           <div class="row justify-content-center mt-5">
               <div class="col-md-6">
                  <form action="{{route('revisor.reject', $add->id)}}" method="POST">
                    @csrf
                      <button type="submit" class="btn btn-danger">Reject</button>
                  </form>
               </div>
               <div class="col-md-6 text-right">
                   <form action="{{route('revisor.accept', $add->id)}}" method="POST">
                    @csrf
                      <button type="submit" class="btn btn-success">Accept</button>
                    </form>
               </div>
           </div>





            </div>
        </div>
    </div>
</div>

@else
    
    <h3 class="text-center mt-5">Non ci sono annunci da revisionare!</h3>

@endif    
@endsection