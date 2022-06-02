@extends('layouts/app')
@section('judul', 'Santri')
@section('prefix', 'Santri')

<x-yajra-dt />
@section('content')
    <div class="d-lg-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('students.create') }}" class="mt-2 badge bg-gradient-primary">+ Tambah</a>
            <a href="{{ route('export.students', 'excel') }}" class="mt-2 badge bg-gradient-primary">Excel</a>
        </div>
        <div>
            @php
                $segment = Request::segment(2);
            @endphp
            <a href="{{ route('students.status', 'baru') }}" type="button"
                class="mt-2 badge @if ($segment == 'baru') bg-gradient-success @else bg-secondary @endif position-relative">
                Mendaftar
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-info  ml-5">
                    <span class="visually-hidden"></span>{{ $jml_baru }}
                </span>
            </a>
            <a href="{{ route('students.status') }}"
                class="mt-2 badge @if ($segment == '') bg-gradient-success @else bg-secondary @endif">Santri
                aktif</a>
            <a href="{{ route('students.status', 'alumni') }}"
                class="mt-2 badge @if ($segment == 'alumni') bg-gradient-success @else bg-secondary @endif">Alumni</a>

        </div>
    </div>
    <table id="student-table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Daerah</th>
                <th>Asrama</th>
                <th>Kota</th>
            </tr>
        </thead>
    </table>
@endsection
