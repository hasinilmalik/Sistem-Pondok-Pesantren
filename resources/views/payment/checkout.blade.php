@extends('layouts/app')
@section('judul', 'Pembayaran')
@section('prefix', 'Checkout')
@push('head')
    <style>
        img.icon {
            max-height: 50px;
            max-width: 50px;
            height: auto;
            width: auto;
        }

    </style>
@endpush
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        PILIH METODE PEMBAYARAN
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Metode Pembayaran</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pay.request') }}" method="POST" id="my_form">
                        @csrf
                        <input type="hidden" name="bill_type_id" value="1">
                        <input type="hidden" name="method" value="TUNAI">
                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                            <div class="d-flex justify-content-between my-2">
                                <div class="col-1">
                                    <img class="icon" src="{{ asset('assets/bakid/favicon.png') }}">
                                </div>
                                <div class="col-7">
                                    <strong>Bayar Tunai / Di Pondok</strong>
                                </div>
                                <span class="primary">></span>
                            </div>
                        </a>
                        <hr>
                        @foreach ($channels as $item)
                            <form action="{{ route('pay.request') }}" method="POST" id="my_form">
                                @csrf
                                <input type="hidden" name="bill_type_id" value="1">
                                <input type="hidden" name="method" value="{{ $item->name }}">
                                <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                                    <div class="d-flex justify-content-between my-2">
                                        <div class="col-1">
                                            <img style="width:50px;"
                                                src="{{ asset('storage/icons') . '/' . $item->code . '.png' }}">
                                        </div>
                                        <div class="col-7">
                                            <strong>{{ $name }}</strong>
                                        </div>
                                        <span class="primary">></span>
                                    </div>
                                </a>
                            </form>
                            <hr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach ($channels as $item)
        <form action="{{ route('pay.request') }}" method="POST">
            @csrf
            <button type="submit">
                <input type="hidden" name="bill_type_id" value="1">
                <input type="hidden" name="method" value="{{ $item->code }}">
                {{ $item->code }}
            </button>
        </form>
    @endforeach --}}
@endsection
