@extends('layouts/app')
@section('judul', 'Santri')
@section('prefix', 'Santri')

<x-datatables />
@section('content')
    <div class="d-flex justify-content-between">
        <div>
            <a href="{{ route('students.status', 'calon_santri') }}" type="button"
                class="btn btn-default position-relative">
                Baru
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-info  ml-5">
                    <span class="visually-hidden"></span>{{ $jml_baru }}
                </span>
            </a>
            <a href="{{ route('students.status', 'alumni') }}" class="btn btn-default">Alumni</a>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Santri</a>
    </div>
    <table id="datatable" class="table table-striped dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Daerah</th>
                <th>Kota</th>
                <th>Act</th>
                {{-- <th>HP</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                @php
                                    
                                @endphp
                                @if ($item->foto)
                                    <img src="{{ asset('storage/foto_santri') . '/' . $item->foto }}"
                                        class="avatar avatar-sm me-3" alt="xd">
                                @else
                                    <img src="{{ asset('storage/foto_santri/user.jpeg') }}" class="avatar avatar-sm me-3"
                                        alt="xd">
                                @endif
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ str($item->nama)->title() }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>{{ $item->daerah }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn bg-gradient-success dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">

                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('students.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <li><a class="dropdown-item" href="{{ route('students.show', $item) }}">Lihat</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('students.edit', $item) }}">Edit</a>
                                    </li>
                                    <li><button class="dropdown-item" style="color: red" type="submit"
                                            onclick="confirm('Yakin Hapus Kak?')">Delete</button></li>
                                </form>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-print"></i> KTS </a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('cetak.mahrom', [$item->id, $item->nama]) }}"><i
                                            class="fas fa-print"></i> Mahrom </a></li>
                            </ul>
                        </div>
                    </td>
                    {{-- <td>{{ $item->family->a_phone }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
