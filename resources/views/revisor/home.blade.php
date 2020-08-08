@extends('layouts.app')
@section('style')
    <style>
        body {
          background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url('/media/sfondoRevisore.jpeg') no-repeat center center fixed;
          -webkit-background-size: cover;
         -moz-background-size: cover;
          background-size: cover;
         -o-background-size: cover;
}
.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: none;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.hrRevisor{
    height: 1px;
    width: 100%;
    background: linear-gradient(90deg, rgb(184, 184, 184) 30%,white);

}

.bgAnnuncio{
    background: linear-gradient(60deg, rgba(84,58,183,1) 0%, rgba(0,172,193,1) 100%);
    color:white;
}
.blocco{
    position: fixed !important;
    right:450px;
    display: flex;
  }


@media screen and (max-width:780px){
    .hide{
        display: none;
}
}

.allora{
    display: none;
} 

@media screen and (max-width:780px){
    .show{
        display: block;
}
} 

    </style>
@endsection
@section('content')


@if($add)


<div class="container mt-5">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card my-5">
            <div class="card-header bgAnnuncio">
                <div class="text-right ">{{__('ui.annuncio')}} # {{$add->id}}</div>
            </div>

            <div class="row px-3 mt-4 mt-md-5">
                <label class="col-md-2">
                    <h5 class="text-center">{{__('ui.utente')}}</h5>
                </label>
                <div class="col-md-10">
                    #{{$add->user->id}},
                    {{$add->user->name}},
                    {{$add->user->email}}
                    <hr class="hrRevisor">
                </div>
            </div>
            
            <div class="row px-3">
                <div class="col-md-2">
                    <h5 class="text-center">{{__('ui.Titolo')}}<h5>
                </div>
                <div class="col-md-10">
                    {{$add->title}}
                    <hr class="hrRevisor">
                </div>
            </div>
            
            <div class="row px-3">
                <div class="col-md-2">
                    <h5 class="text-center">{{__('ui.descr')}}<h5>
                </div>
                <div class="col-md-10">
                    {{$add->description}}
                    <hr class="hrRevisor">
                </div>
            </div>
          <div class="card-body">

                <div class="container-fluid">
                    <div class="row mt-md-4 justify-content-center">
                        <div class="col-2 position-relative text-center hide">
                            <form action="{{route('revisor.reject', $add->id)}}" method="POST">
                                @csrf
                                  <button type="submit" class="btn btn-danger px-3 position-fixed">{{__('ui.rifiuta')}}</button>
                            </form> 
                        </div>

                        <div class="col-12 col-md-8">

                        @foreach($add->images as $image)
                        
                            <div class="col-12 text-center">
                            <img src="{{$image->getUrl(300, 150)}}" alt="" class="rounded img-fluid mt-5 mt-md-0 mb-5"> 
                            </div>
                            <div class="col-12">
                                <div class="table-responsive rounded">
                                    <table class="table">
                                        <tbody>
                                            <tr class="text-center bgAnnuncio">
                                            <td class="px-1">{{__('ui.adulto')}}</td>
                                            <td>{{__('ui.medico')}}</td>
                                            <td>{{__('ui.caric')}}</td>
                                            <td>{{__('ui.viol')}}</td>
                                            <td>{{__('ui.razz')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="bordi-tabella"><span class="semaforo">{{$image->adult}}</span></td>
                                                <td class="bordi-tabella"><span class="semaforo">{{$image->medical}}</span></td>
                                                <td class="bordi-tabella"><span class="semaforo">{{$image->spoof}}</td>
                                                <td class="bordi-tabella"><span class="semaforo">{{$image->violence}}</td>
                                                <td class="bordi-tabella"><span class="semaforo">{{$image->racy}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if ($image->labels)
                                    <div class="mb-5">
                                        @foreach ($image->labels as $label)
                                            <span class="bgGrigio px-1 ml-1 rounded">#{{$label}}</span>   
                                        @endforeach
                                    </div> 
                                @endif
                            
                            </div>

                        @endforeach
                        </div>

                        <div class="col-2 position-relative hide">
                            <form action="{{route('revisor.accept', $add->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success px-3 position-fixed">{{__('ui.rccett')}}</button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="allora text-center mb-3">
                    <form action="{{route('revisor.accept', $add->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success px-3 w-50">{{__('ui.rccett')}}</button>
                    </form>
                </div>

                <div class="text-center allora mb-3">
                    <form action="{{route('revisor.reject', $add->id)}}" method="POST">
                        @csrf
                          <button type="submit" class="btn btn-danger px-3 w-50">{{__('ui.rifiuta')}}</button>
                    </form> 
                </div>

        </div>
        </div>
      </div>
    </div>
</div>
   
   {{--  <div class="row justify-content-center mt-1"> --}}
       {{-- <div class="col-md-4 ">

       </div> --}}
       {{-- <div class="col-md-4 text-center">
        <form action="{{route('revisor.undo', $add->id)}}" method="POST">
            @csrf
              <button type="submit" class="btn btn-warning">UNDO</button>
        </form>
       </div> --}}
     


@else

  <div class="container mt-5">
      <div class="row justify-content-center">
    <h3 class="text-center text-white mt-5">{{__('ui.norevisione')}}</h3>
     </div>
 </div>
@endif    
@endsection