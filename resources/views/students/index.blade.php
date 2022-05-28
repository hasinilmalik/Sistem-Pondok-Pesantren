@extends('layouts/app')
@section('judul', 'Santri')
@section('prefix', 'Santri')

<x-yajra-dt />
@section('content')
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
