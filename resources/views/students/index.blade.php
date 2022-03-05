@extends('layouts/app')
@section('judul', 'Santri')
<x-datatables />
@section('content')

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
