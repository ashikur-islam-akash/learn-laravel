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
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">
                                            <span class="sa-nav__icon">
                                                <i class="fas fa-home"></i>
                                            </span>Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Users</h1>
                        </div>
                        @can('user-create')
                            <div class="col-auto d-flex"> <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-success"> <i class="fa fa-user-plus"></i> Add New User </a></div>
                        @endcan

                        <div class="col-auto d-flex">
                        </div>
                        <div class="card">
                            <div class="col-md-4 col-sm-9 p-4">
                                <input type="text" placeholder="Start typing to search for roles" class="form-control form-control--search mx-auto" id="table-search"/>
                            </div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init-1" data-sa-search-input="#table-search">
                                <thead>
                                <tr>
                                    <th style="width: 3rem;">Sl NO</th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> phone </th>
                                    <th> Role </th>
                                    <th style="width: 7rem;"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key =>$user)
                                    <tr>
                                        <td>
                                            {{++$key}}
                                        </td>
                                        <td>
                                            @if(!empty($user->image))
                                                <div class="sa-chat__contact-avatar sa-symbol sa-symbol--shape--circle">
                                                    <img src="{{asset("storage/$user->image")}}" class="circle" width="120" height="120" alt="" />
                                                </div>
                                            @else
                                                <div class="sa-chat__contact-avatar sa-symbol sa-symbol--shape--circle">
                                                    <img src="{{asset('images/user-image.jpg')}}" class="circle" width="120" height="120" alt="" />
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            @if(!empty($user->phone))
                                                {{$user->phone}}
                                            @else
                                                <span class="text-muted">Not Available</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-primary">
                                                    @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $v)
                                                            {{ $v }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row g-2 justify-content-start">
                                                @can('user-show')
                                                    <div class="col-auto">
                                                        <a href="{{route('admin.users.show', $user->id)}}" type="button" class="btn btn-success btn-sm">
                                                            <i class="fas fa-eye text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('user-edit')
                                                <div class="col-auto">
                                                    <a href="{{route('admin.users.edit',$user->id)}}" type="button" class="btn btn-purple btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('user-delete')
                                                <div class="col-auto">
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-confirm" data-name="{{$user->name}}">
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
        </div>
    </div>
@endsection
@section('custom-js')
    <script>

        (function() {
            $.fn.DataTable.ext.pager.numbers_length = 5;
            $.fn.DataTable.defaults.oLanguage.sInfo = 'Showing _START_ to _END_ of _TOTAL_';
            $.fn.DataTable.defaults.oLanguage.sLengthMenu = 'Rows per page _MENU_';

            const template = '' +
                '<"sa-datatables"' +
                '<"sa-datatables__table"t>' +
                '<"sa-datatables__footer"' +
                '<"sa-datatables__controls"' +
                '<"sa-datatables__legend"i>' +
                '<"sa-datatables__divider">' +
                '<"sa-datatables__page-size"l>' +
                '>' +
                '<"sa-datatables__pagination"p>' +

                '>' +
                '>';

            $('.sa-datatables-init-1').each(function() {
                const tableSearchSelector = $(this).data('sa-search-input');
                const table = $(this).DataTable({
                    dom: template,
                    stateSave: true,
                    paging: true,
                    ordering: true,
                    drawCallback: function() {
                        $(this.api().table().container()).find('.pagination').addClass('pagination-sm');
                    },
                    /*for dropdown select option*/
                    initComplete: function () {
                        this.api()
                            .columns()
                            .every(function () {
                                var column = this;
                                var select = $('<select><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '">' + d + '</option>');
                                    });
                            });
                    },
                });

                if (tableSearchSelector) {
                    $(tableSearchSelector).on('input', function() {
                        table.search(this.value).draw();
                    });
                }
                $('.sa-datatables-init-1 thead tr').addClass('bg-table-primary');
                $('.sa-datatables-init-1 tbody').addClass('bg-table-info-soft');
            });
        })();

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

            $(".swal-title").css('font-size', '20px');
            $(".swal-icon").css('margin', '25px auto 0px');
            $(".swal-button--danger").css('background-color', '#00a629');
            $(".swal-button--cancel").css('background-color', '#df4740');
            $(".swal-button--cancel").css('color', '#fff');
        });
    </script>
@endsection
