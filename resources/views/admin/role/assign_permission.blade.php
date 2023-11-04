@extends('layouts.app')
@section('title', __('Role'))
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
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.roles.index')}}">{{__('Roles')}}</a></li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Assign Permission for {{ $role->name }}</h1>
                        </div>
                        <div class="col-auto d-flex"> <a href="{{route('admin.roles.index')}}" class="btn btn-success"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body bg_silver">
                        <div class="w-100">
                            {{--<form action="{{ route('admin.assign-permission-update',$role->id) }}" method="post">
                                @csrf
                                <input type="checkbox" class="form-check-input" id="selectAll" value="selectAll"> Select / Deselect All<br/><br/>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="checkbox" id="1" class="form-check-input permission-checkbox type" value="user"> <strong style="font-size: 1.3rem"> User</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission1" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission1" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission1" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="2" class="form-check-input permission-checkbox type" id="permission" value="permission"> <strong style="font-size: 1.3rem"> Permission</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission2" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission2" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission2" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="3" class="form-check-input permission-checkbox type" id="role" value="role"> <strong style="font-size: 1.3rem"> Role</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission3" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission3" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission3" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="4" class="form-check-input permission-checkbox type" value="user"> <strong style="font-size: 1.3rem"> User</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission4" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission4" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission4" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="5" class="form-check-input permission-checkbox type" id="permission" value="permission"> <strong style="font-size: 1.3rem"> Permission</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission5" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission5" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission5" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>permission
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="6" class="form-check-input permission-checkbox type" id="role" value="role"> <strong style="font-size: 1.3rem"> Role</strong><br/><br/>
                                        <div style="padding-left: 2rem;">
                                            <input type="checkbox" @if(in_array($permission->name??'Add', $selelcted_permission)) checked @endif class="form-check-input permission6" style="cursor: pointer" value="{{$permission->name??'Add'}}" name="permission[]"/><span> {{$permission->name??'Add'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Edit', $selelcted_permission)) checked @endif class="form-check-input permission6" style="cursor: pointer" value="{{$permission->name??'Edit'}}" name="permission[]"/><span> {{$permission->name??'Edit'}} </span><br>
                                            <input type="checkbox" @if(in_array($permission->name??'Delete', $selelcted_permission)) checked @endif class="form-check-input permission6" style="cursor: pointer" value="{{$permission->name??'Delete'}}" name="permission[]"/><span> {{$permission->name??'Delete'}} </span><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 row">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">{{__('Assign')}}</button>
                                    </div>
                                </div>
                            </form>--}}
                             <form action="{{ route('admin.assign-permission-update',$role->id) }}" method="post">
                                @csrf
                                <input type="checkbox" class="form-check-input" id="selectAll" value="selectAll"> Select / Deselect All<br/><br/>
                                <div class="col-md-12 row mb-4">
                                    @foreach($all_permissions as $key=>$permission)
                                        <div class="col-md-4">
                                            <label class="form-check form-control" style="cursor: pointer">
                                                <input type="checkbox" @if(in_array($permission->name, $selelcted_permission)) checked @endif class="form-check-input" style="cursor: pointer" value="{{$permission->name}}" name="permission[]"/><span> {{$permission->name}} </span>
                                            </label>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="col-md-12 row">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">{{__('Assign')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('profile-js')
    <script>
        // select deselect checkbox
        $('#selectAll').click(function() {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
        $('.type').click(function() {
            if (this.checked) {
                $('.permission'+this.id).each(function() {
                    this.checked = true;
                });
            } else {
                $('.permission'+this.id).each(function() {
                    this.checked = false;
                });
            }
        });
        // delete Alert message
        $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });

            $(".swal-title").css('font-size', '23px');
            $(".swal-icon").css('margin', '28px auto 5px');
            $(".swal-button--danger").css('background-color', '#00a629');
            $(".swal-button--cancel").css('background-color', '#df4740');
            $(".swal-button--cancel").css('color', '#fff');
        });
    </script>
@endsection

