@extends('layouts.app')
@section('style')
    <style>
      .cerca{
        width:30vh;
      }
      .revisore{
        width:30vh;
      }

    </style>
@endsection
@section('content')


<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Admin's page</h2>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <input class="p-1 cerca rounded-pill mb-4 shadow" onkeyup="myFunction()" type="text" placeholder="Cerca" id="cerca">

            <div class="table-responsive rounded">
                <table class="table table-hover">
                    <thead class="bgAnnuncio">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{__('ui.name')}}</th>
                        <th scope="col">Email</th>
                        <th scope="col">{{__('ui.gestisci')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="trova">
                        <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->is_revisor==true)
                                  
                                <form action="{{route('removeRevisor', $user->id)}}" method="POST">
                               
                                    @csrf
                                   <button class="btn btn-danger revisore">{{__('ui.rendiNo')}}</button>
                                </form>
                                    
                                @else
                            <form action="{{route('makeRevisor', $user->id)}}" method="POST">
                               
                                 @csrf
                                <button class="btn btn-info revisore">{{__('ui.rendi')}}</button>
                            </form>
    
                                @endif
                            
                            </td>
                          </tr> 
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>

function myFunction() {

var input, filter, td, tr, a, i;
input = document.getElementById('cerca');
filter = input.value.toUpperCase();
tr = document.getElementsByClassName('trova');

for (i = 0; i < tr.length; i++) {
    a = tr[i].innerHTML;

  if (a.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
  } else {
    tr[i].style.display = "none";
  }
 }
}

</script>
@endpush
@endsection