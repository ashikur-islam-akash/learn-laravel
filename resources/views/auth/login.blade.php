@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-8">
                    <img
                        src="{{asset('images/left.png')}}"
                        class="h-100 w-100 object-fit-cover"
                        alt=""
                        width="640"
                        height="360"
                    />
                </div>
                <div class="col-md-4">
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mt-4 sme-logo mb-4">
                                <img style="width: 5rem;" class="rounded-circle" src="{{asset('images/logo.png')}}" alt="image">
                            </div>
                            <div class="fs-exact-14 mb-4">
                                <h3 class="text-center text-medium-emphasis text-success" style="font-size:18px">{{__('Accounting Software for')}}</h3>
                                <h3 class="text-center text-medium-emphasis text-success" style="font-size:18px">{{__('Automatic Withdrawal Applications(WAs)')}}</h3>
                                <h3 class="text-center text-medium-emphasis text-success" style="font-size:18px">{{__('& Financial Statements')}}</h3>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{__('Email')}}</label>
                                <input type="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" @if(Cookie::has('email')) value="{{ Cookie::get('email')?? old('email') }}" @else value="{{ old('email') }}" @endif required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{__('Password')}}</label>
                                <input type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"  name="password" @if(Cookie::has('password')) value="{{ Cookie::get('password')}}" @endif required autocomplete="current-password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4 row py-2 flex-wrap">
                                <div class="col-auto me-auto">

                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4 row py-2 flex-wrap text-center">
                                <div class="text-center">
                                    <label class="form-check mb-0" for="remember">
                                        <input type="checkbox" class="form-check-input" style="float: none" name="remember" id="remember" @if(Cookie::has('email')) checked @endif>
                                        <span class="form-check-label">{{__('Remember Me')}}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success btn-lg form-control">{{__('Login')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
