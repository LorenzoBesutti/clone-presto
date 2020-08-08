@extends('layouts.app')
@section('style')
    
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
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gestisci</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->is_revisor==true)
                                  
                                <form action="{{route('removeRevisor', $user->id)}}" method="POST">
                               
                                    @csrf
                                   <button class="btn btn-danger w-50">Rimuovi da revisore</button>
                                </form>
                                    
                                @else
                            <form action="{{route('makeRevisor', $user->id)}}" method="POST">
                               
                                 @csrf
                                <button class="btn btn-info w-50">Rendi revisore</button>
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


</script>
@endpush
@endsection