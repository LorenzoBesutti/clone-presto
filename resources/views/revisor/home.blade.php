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
  /* .blocco1{
    position: fixed !important;
    z-index: 999;
    
  } */
.reject{
    position:absolute;
    position: fixed;
    left:380px;
    top: 420px;
}
.accept{
    position:absolute;
    position: fixed;
    right:380px;
    top: 420px;
}

@media screen and (max-width:700px){
    .reject{
    position:absolute;
    position: fixed;
    left:77%;
    top: 40%;
}
.accept{
    position:absolute;
    position: fixed;
    right:5%;
    top: 30%;
}
}

    </style>
@endsection
@section('content')


@if($add)
{{-- 
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
 --}}
<div class="container mt-5">
    <div class="row position-relative">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
        
        <form class="form-signin">
            <div class="card-header bgAnnuncio">
                <div class="text-md-right ">Annuncio # {{$add->id}}</div>
                </div>
          <div class="card-body">
            
           
              

            <div class="row mt-5">
                <label class="col-md-2">
                    <h5 class="text-center">Utente</h5>
                </label>
                <div class="col-md-10">
                    # {{$add->user->id}},
                    {{$add->user->name}},
                    {{$add->user->email}},
                    <hr class="hrRevisor">
                </div>
            </div>
              
              

              <div class="row ">
                <div class="col-md-2">
                    <h5 class="text-center">Titolo<h5>
                </div>
                <div class="col-md-10">
                    {{$add->title}}
                    <hr class="hrRevisor">
                </div>
            </div>
              
            <div class="row">
                <div class="col-md-2">
                    <h5 class="text-center">Descrizione<h5>
                </div>
                <div class="col-md-10">
                    {{$add->description}}
                    <hr class="hrRevisor">
                </div>
            </div>

          <div class="container">
            <div class="row mt-4 mx-auto">
                
               
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    @foreach($add->images as $image)
                    <div class="row-mb-2">
                    <div class="col-12 col-md-4 ">
                    <img src="{{Storage::url($image->file)}}" alt="" class="rounded img-fluid mt-5 mt-md-0 mb-5 "> 
                    </div>
                    <div class="col-12 col-md-8">
                      {{$image->id}}<br>
                      {{$image->file}}<br>
                      {{Storage::url($image->file)}}<br>
                    </div>
                    </div>
                    @endforeach
                    
                   
                </div>
               

            </div>
        </div>
          
          
              
            
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
   
   {{--  <div class="row justify-content-center mt-1"> --}}
      <div class="blocco1">
       <div class="col-md-4 reject">
         <form action="{{route('revisor.reject', $add->id)}}" method="POST">
            @csrf
              <button type="submit" class="btn btn-danger px-3">Reject</button>
        </form> 
       </div>
    </div>  
       {{-- <div class="col-md-4 text-center">
        <form action="{{route('revisor.undo', $add->id)}}" method="POST">
            @csrf
              <button type="submit" class="btn btn-warning">UNDO</button>
        </form>
       </div> --}}
    <div>
     <div class="col-md-4 text-right accept">
        <form action="{{route('revisor.accept', $add->id)}}" method="POST">
            @csrf
              <button type="submit" class="btn btn-success  position-sticky">Accept</button>
        </form>
       </div>
   </div>
     
    


  


@else

  <div class="container mt-5">
      <div class="row justify-content-center">
    <h3 class="text-center text-white mt-5">Non ci sono annunci da revisionare!</h3>
     </div>
 </div>
@endif    
@endsection