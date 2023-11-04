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
                                    <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Permission</a></li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Permission List</h1>
                        </div>
                        <div class="col-auto d-flex"> <a href="{{route('admin.users.index')}}" class="btn btn-info"> <i class="fa fa-arrow-alt-circle-right"></i> Back </a></div>
                        <div class="col-auto d-flex">
                        </div>
                        <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="w-100">
                                                <form action="{{route('admin.permissions.store')}}" method="post">
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
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i> {{__('Save')}}</button>
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
