@extends('layouts.app')

@section('content')
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container-fluid {{--container--max--xl--}}">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Permissions</a></li>
                                    <li class="breadcrumb-item">{{__('Edit')}}</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Update Permission</h1>
                        </div>
                        <div class="col-auto d-flex"> <a href="{{route('admin.permissions.index')}}" class="btn btn-info"> <i class="fa fa-arrow-alt-circle-right"></i> Back </a></div>
                        <div class="col-auto d-flex">
                        </div>
                        <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="w-100">
                                                <form action="{{route('admin.permissions.update',$permission->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-4">
                                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" value="{{ $permission->name }}" class="form-control" id="name" placeholder="Enter your Name" required>
                                                    </div>
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> {{__('Update User')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
