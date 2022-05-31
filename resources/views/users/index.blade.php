@extends('layouts/app')
@section('judul', 'Users')
@section('prefix', 'Users')

<x-yajra-dt />
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
    <table id="users-table" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Dibuat</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection
