@extends('layouts/app')
@section('judul', 'Users')
@section('prefix', 'Users')

<x-yajra-dt />
@section('content')
    <div class="d-lg-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('students.create') }}" class="mt-2 badge bg-gradient-primary">+ Tambah</a>
            <a href="{{ route('export.students', 'excel') }}" class="mt-2 badge bg-gradient-primary">Excel</a>
        </div>
        <div>

        </div>
    </div>
    <table id="users-table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama Santri</th>
                <th>Email</th>
                <th>Dibuat</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection
