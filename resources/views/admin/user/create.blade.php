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
                                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">User List</h1>
                        </div>
                        <div class="col-auto d-flex"> <a href="{{route('admin.users.index')}}" class="btn btn-info"> <i class="fa fa-arrow-alt-circle-right"></i> Back </a></div>
                        <div class="col-auto d-flex">
                        </div>
                        <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="w-100">
                                                <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="Enter your Name" required>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your Email" required autocomplete="off">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" name="phone" value="{{old('phone')}}"   class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-4">
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" autocomplete="off">
                                                            <button class="btn btn-secondary" id="togglePassword_1" onclick="togglePass()"  type="button" style=" cursor: pointer;">
                                                                <svg class="svg-inline--fa fa-eye fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                                                            </button>
                                                            <button class="btn btn-secondary" onclick="togglePass()"  style="display: none" id="togglePassword_2" type="button"   style=" cursor: pointer;">
                                                                <svg class="svg-inline--fa fa-eye-slash fa-w-20" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="eye-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
                                                            </button>
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="role" class="form-label">User Role <span class="text-danger">*</span></label>
                                                        <select class="form-select" id="role" name="role" title="ssss" required>
                                                            <option selected="" disabled hidden>Please Select User Role</option>
                                                            @foreach($roles as $key=>$role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="image" class="form-label">{{__('Change Photo')}}</label>
                                                        <input type="file" name="image" class="form-control" id="image" />
                                                    </div>
                                                   {{-- <div class="mb-4">
                                                        <label for="quill_editor" class="form-label">Address</label>
                                                        <div id="quill_editor"></div>
                                                        <input type="hidden" id="address" name="address" value="{{old('address')}}">
                                                    </div>--}}


                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> {{__('Create User')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <img src="{{asset('images/user_create_1.png')}}" alt="user" class="img-fluid" style="max-height: 475px;">
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
        //password show and hide
        var password = document.getElementById("password");   // Input
        var togglePassword1 = document.getElementById("togglePassword_1");               // Show pass
        var togglePassword2 = document.getElementById("togglePassword_2");               // Hide pass

        function togglePass() {
            if (password.type === "password") {
                password.type = 'text';
                togglePassword1.style.display = 'none';
                togglePassword2.style.display = 'inline';
            } else {
                password.type = 'password';
                togglePassword1.style.display = 'inline';
                togglePassword2.style.display = 'none';
            }
        }


        // address editor
        var quill = new Quill('#quill_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['blockquote', 'code-block'],

                    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                    [{ 'direction': 'rtl' }],                         // text direction

                    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                    [{ 'font': [] }],
                    [{ 'align': [] }],

                    ['clean']                                         // remove formatting button
                ],
            },
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("address").value = quill.root.innerHTML;
        });


    </script>
@endsection
