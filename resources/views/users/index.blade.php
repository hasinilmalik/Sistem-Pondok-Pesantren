@extends('layouts/app')
@section('judul', 'Users')
@section('prefix', 'Users')
@section('content')

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-ui.modal id="modal-default" :modalHeader="true" title="Add user">
            <x-slot name="body">
                <x-form.input name="name" label="Name" type="text" value="{{ old('name') }}" />
                <x-form.input name="email" label="email" type="text" value="{{ old('email') }}" />
                <x-form.input name="password" label="password" type="text" value="{{ old('password') }}" />
                <x-form.input name="password_confirmation" label="password_confirmation" type="text"
                    value="{{ old('password_confirmation') }}" />
                <x-form.select name="role_" label="Sebagai" :options="['super admin', 'admin', 'user']" />
            </x-slot>
            <x-slot name=" footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn bg-gradient-primary">Simpan</button>
            </x-slot>
        </x-ui.modal>
    </form>

    <div class="d-lg-flex justify-content-between mb-3">
        <div>
            <a href="#" class="mt-2 badge bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modal-default">+
                Tambah</a>
            {{-- <a href="{{ route('export.students', 'excel') }}" class="mt-2 badge bg-gradient-primary">Excel</a> --}}
        </div>
        <div>

        </div>
    </div>
    <table id="user-table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Sebagai</th>
                <th>Dibuat</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@push('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
@endpush
@push('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>


    @php
    $url = Request::segment(2);
    if ($url == null) {
        $url = 'santri';
    } else {
        $url = $url;
    }
    @endphp
    <script type="text/javascript">
        $(document).ready(function() {
            var url = {!! json_encode($url) !!};
            var table = $('#user-table').DataTable({
                "columnDefs": [{
                        "targets": '_all',
                        "defaultContent": "",
                    },
                    // {
                    //     "targets": [2, 3, 4],
                    //     "className": 'dt-body-center'
                    // },
                ],

                processing: true,
                serverSide: true,
                'bsort': false,
                responsive: true,
                lengthChange: false,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 20,
                "oLanguage": {
                    "sSearch": ""
                },

                ajax: "{{ url('json/users') }}",

                columns: [{
                        data: 'name',
                    },
                    {
                        data: 'email',
                    },
                    {
                        data: 'roles.name',
                    },
                    {
                        data: 'created_at',
                    },
                    {
                        data: 'action',
                    },
                ]
            });
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
@endpush
