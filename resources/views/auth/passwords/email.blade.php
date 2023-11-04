@extends('layouts.auth')

@section('content')
    <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
        <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
            @if (session('status'))
                <div id="successMessage" class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <h1 class="mb-0 fs-3">{{__('Forgot password?')}}</h1>
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">
                    {{__('Enter the email address associated with your account and we will send a link to reset your password.')}}
                </div>
                <div class="mb-4">
                    <label class="form-label">{{__('Email Address')}}</label>
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div><button type="submit" class="btn btn-success btn-lg w-100">{{__('Reset Password')}}</button></div>
                <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">
                    <a href="{{route('login')}}">{{__('Sign in')}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
