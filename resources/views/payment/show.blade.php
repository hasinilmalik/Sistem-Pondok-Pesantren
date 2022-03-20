@extends('layouts/app')
@section('judul', 'Detail')
@section('prefix', 'Detail')
@section('content')
    @php
    if ($transaction->status == 'UNPAID') {
        $status = 'Belum';
    } else {
        $status = $transaction->status;
    }
    @endphp
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <div>
                        <h5 class="mb-0">Detail Transaksi</h5>
                        <small class="text-secondary">#{{ $transaction->reference }}</small>
                    </div>
                    <h6 class="mb-0"> <span class="badge bg-gradient-warning">{{ $status }}</span>
                    </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        Total :
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-200 border-radius-lg">
                            <div class="">
                                <h3 class="mb-0">Rp. {{ number_format($transaction->amount) }}</h3>
                            </div>
                        </li>
                        @if ($transaction->order_items[0]->name == 'Pendaftaran')
                            <li class="list-group-item border-0 d-flex p-2 mt-2 border-radius-lg">
                                <div class="">
                                    Pembayaran diatas mencangkup :
                                    <table class="table text-sm">
                                        <tr>
                                            <td>Pesantren</td>
                                        </tr>
                                        <tr>
                                            <td>Madrasah Diniyah</td>
                                        </tr>
                                        <tr>
                                            <td>Infaq Gedung</td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="row">
                <div class="card h-100 mb-4">
                    <div class="card-body pt-4 p-2">
                        <h6 class="text-uppercase text-body text-sm font-weight-bolder"><span
                                class="badge bg-gradient-info">Rincian</span></h6>
                        <ul class="list-group">
                            @foreach ($transaction->order_items as $item)
                            @endforeach
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-dollar" aria-hidden="true"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{ $item->name }}</h6>
                                        {{-- <span class="text-xs">27 March 2020, at 12:30 PM</span> --}}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    Rp. {{ number_format($item->price) }}
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-dollar" aria-hidden="true"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Biaya Admin</h6>
                                        {{-- <span class="text-xs">27 March 2020, at 12:30 PM</span> --}}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    Rp. {{ number_format($transaction->fee_customer) }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card h-100 mb-4">
                    <div class="card-body pt-4 p-2">
                        <h6 class="text-uppercase text-body text-sm font-weight-bolder"><span
                                class="badge bg-gradient-info">Cara Bayar</span></h6>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($transaction->instructions as $intruksi)
                                <div class="accordion-item">
                                    {{-- <h2 class="accordion-header" id="flush-heading{{ str($intruksi->title)->snake() }}"> --}}
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{ str($intruksi->title)->snake() }}"
                                        aria-expanded="false"
                                        aria-controls="flush-collapse{{ str($intruksi->title)->snake() }}">
                                        {{ $intruksi->title }}
                                    </button>
                                    {{-- </h2> --}}
                                    <div id="flush-collapse{{ str($intruksi->title)->snake() }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading{{ str($intruksi->title)->snake() }}"
                                        data-bs-parent="#accordionFlushExample">
                                        {{-- <div class="accordion-body"> --}}
                                        <ul style="list-style-type: none;">
                                            @foreach ($intruksi->steps as $step)
                                                <li class="text-sm list">{{ $loop->iteration }}.
                                                    {!! $step !!}</li>
                                            @endforeach
                                        </ul>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
