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
                                    <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Roles</a></li>
                                    <li class="breadcrumb-item">show</li>
                                </ol>
                            </nav>
                            <h1 class="h4 m-0">Role Details</h1>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="w-100">
                                        <table class="table table-bordered table-hover table-striped table-responsive">
                                            <tbody>
                                            <tr>
                                                <th>{{ __('Role Name') }}</th>
                                                <td>{{ $role->name ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Permissions') }}</th>
                                                <td>
                                                    @foreach($rolePermissions->permissions as $rolePermission)
                                                        <span class="badge badge-sa-success">{{ $rolePermission->name ?? '' }}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Create At') }}</th>
                                                <td>{{ $role->created_at ?? '' }}</td>
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

