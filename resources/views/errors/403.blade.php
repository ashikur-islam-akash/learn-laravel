@extends('layouts.app')

@section('content')
    <div class="sa-error">
        <div class="sa-error__background-text">Oops! Error 403</div>
        <div class="sa-error__content">
            <p class="sa-error__background-sm-text">
                User does not have the right permissions.
                <br />
            </p>
            <p class="sa-error__text">Go to the home page to start over.</p>
            <a class="btn btn-success btn-lg" href="{{route('admin.dashboard')}}">Go To Home Page</a>
        </div>
    </div>
@endsection
