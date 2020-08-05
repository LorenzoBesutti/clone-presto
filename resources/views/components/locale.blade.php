<form action="{{route('locale',$lang)}}" method="post">
    @csrf
    <button type="submit" class="nav-link bg-transparent border-none">
    <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>
   