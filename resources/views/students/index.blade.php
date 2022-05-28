@extends('layouts/app')
@section('judul', 'Santri')
@section('prefix', 'Santri')

<x-yajra-dt />
@section('content')
    <div class="d-lg-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('students.create') }}" class="mt-2 badge bg-gradient-primary">+ Tambah</a>
        </div>
        <div>
            @php
                $segment = Request::segment(2);
            @endphp
            <a href="{{ route('students.status') }}/baru" type="button"
                class="mt-2 badge @if ($segment == 'baru') bg-gradient-success @else bg-secondary @endif position-relative">
                Baru
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-info  ml-5">
                    <span class="visually-hidden"></span>{{ $jml_baru }}
                </span>
            </a>
            <a href="{{ route('students.status') }}/alumni"
                class="mt-2 badge @if ($segment == 'alumni') bg-gradient-success @else bg-secondary @endif">Alumni</a>
            <a href="{{ route('students.status') }}"
                class="mt-2 badge @if ($segment == '') bg-gradient-success @else bg-secondary @endif">Santri
                aktif</a>
        </div>
    </div>
    <table id="student-table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kota</th>
                <th>Daerah</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection
