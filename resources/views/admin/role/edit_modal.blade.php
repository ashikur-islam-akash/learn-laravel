            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md"}'>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="w-100">
                                        <form action="{{route('admin.roles.update', $role->id)}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-4">
                                                <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $role->name }}"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name" placeholder="Enter your name" required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button
                                                >
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
