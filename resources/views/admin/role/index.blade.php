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
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">
                                            <span class="sa-nav__icon">
                                                <i class="fas fa-home"></i>
                                            </span>Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Roles</h1>
                        </div>
                        @can('role-permission-create')
                            <div class="col-auto d-flex"> <a  class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createRoleModal"><i class="fa fa-plus"></i> New Role</a></div>
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="col-md-4 col-sm-9 p-4">
                        <input type="text" placeholder="Start typing to search for roles" class="form-control form-control--search mx-auto" id="table-search"/>
                    </div>
                    <div class="sa-divider"></div>
                    <table class="sa-datatables-init" data-sa-search-input="#table-search">
                        <thead>
                        <tr>
                            <th style="width: 3rem;">Sl NO</th>
                            <th>Name</th>
                            <th style="width: 35rem;">Permission list</th>
                            <th>Created Date</th>
                            @can('permission-assign')
                                <th>
                                    Permission
                                </th>
                            @endcan
                            <th style="width: 7rem;">Action</th>
                        </tr>
                        </thead>
                        <tbody class="small">
                        @php
                            $key=0;
                        @endphp
                        @foreach($roles as $key =>$role)
                            @php
                                $bg=($key%2==0?'badge-sa-info':'badge-sa-success');
                            @endphp
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>
                                    {{$role->name}}
                                </td>
                                <td>
                                    @foreach($role->permissions as $per)
                                        <span class="badge {{ $bg }} ">{{ $per->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-nowrap">{{$role->created_at}}</td>
                                @can('permission-assign')
                                    <td>
                                        <div class="row g-3">
                                            <div class="col-auto">
                                                <a type="button" href="{{ route('admin.assign-permission',$role->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-user-secret"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                @endcan

                                <td>
                                    <div class="row g-3 justify-content-start">
                                        @can('role-permission-show')
                                            <div class="col-auto">
                                                <a href="{{route('admin.roles.show', $role->id)}}" type="button" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye text-white"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('role-permission-edit')
                                            <div class="col-auto">
                                                <a href="javascript:void(0)" onclick="edit_role('{{$role->id}}');" type="button" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('role-permission-delete')
                                            <div class="col-auto">
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-confirm" data-name="{{$role->name}}">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--    Add new role modal--}}
    <div
        class="modal fade"
        id="createRoleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                    <button
                        type="button"
                        class="sa-close sa-close--modal"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <div class="w-100">
                                            <form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-4">
                                                    <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="{{old('name')}}"   class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Close</button>
                                                    <button type="submit" class="btn btn-success">{{__('Save')}}</button>
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
    {{--    Add new role modal end --}}

    {{--   Start edit modal--}}
    <div class="modal fade" id="discount_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="discount-modal-content">

            </div>
        </div>
    </div>
    {{--  End edit modal--}}

@endsection
@section('profile-js')
    <script type="text/javascript">
        function edit_role(id){
            console.log(id);
            $.post('{{ route('admin.roles-edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                console.log(id);
                $('#discount_modal #discount-modal-content').html(data);
                $('#discount_modal').modal('show', {backdrop: 'static'});
            });
        }
    </script>
    <script>

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
