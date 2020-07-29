@extends('layouts.app')
@section('style')
<style>
    body{
        background: url('/media/mare.jpg');
        background-size:cover;
        background-position: center;
     background-repeat: no-repeat;
    }
  
    .bordo1_password{
        border:none;
        border-bottom: 3px solid yellow !important;
        color: white;
    }
    .card-wrap{
        background-color: rgba(0, 0,0, 0.3);
        
    }

    .form-control{
        background-color: transparent !important;
        color: white;
    }
    .bianco{
        color: white;
    }
</style>
    
@endsection

@section('content')

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-wrap">
                <div class="card-header text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form class="bianco " method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror bordo1_password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
