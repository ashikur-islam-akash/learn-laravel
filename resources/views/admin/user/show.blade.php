@extends('layouts.app')
@section('title', __('Entrepreneur Loan Installment list'))
@section('content')
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container-fluid">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                                    <li class="breadcrumb-item">show</li>
                                </ol>
                            </nav>
                            <h1 class="h4 m-0">Users Details</h1>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                    <div class="row">
                        <div class="col-md-4 com-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="pt-3 pb-3">
                                        <div class="sa-symbol sa-symbol--shape--rounded" style="--sa-symbol--size:12rem">
                                            <img src="{{asset("storage/$user->image")}}" width="96" height="96" alt="">
                                        </div>
                                    </div>
                                    {{--<div class="text-center mt-4">
                                        <div class="fs-exact-16 fw-medium">Jessica Moore</div>
                                        <div class="fs-exact-13 text-muted">
                                            <div class="mt-1">
                                                <a href="">jessica-moore@example.com</a>
                                            </div>
                                            <div class="mt-1">+38 (094) 730-24-25</div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="w-100">
                                        <table class="table table-bordered table-hover table-striped table-responsive">
                                            <tbody>
                                            <tr>
                                                <th>{{ __('User Name') }}</th>
                                                <td>{{ $user->name ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Email') }}</th>
                                                <td>{{ $user->email ??'' }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Mobile') }}</th>
                                                <td>{{ $user->phone ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Role') }}</th>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        {{ $role->name?? '' }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Address') }}</th>
                                                <td>{{ $user->address?? '' }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
<script>

</script>
@endsection

