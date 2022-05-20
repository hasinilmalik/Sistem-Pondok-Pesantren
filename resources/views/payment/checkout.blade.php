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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <!-- Button trigger modal -->
    <div class="row justify-content-center mx-auto d-block">
        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            @hasrole('admin|super admnin')
                Virtual
            @else
                PILIH METODE PEMBAYARAN
            @endhasrole
        </button>
        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#bayarPendaftaran">
            TUNAI
        </button>
    </div>

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
                    @hasrole('guest')
                        <form action="{{ route('pay.request') }}" method="POST" id="my_form1">
                            @csrf
                            <input type="hidden" name="bill_type_id" value="{{ Request::segment(2) }}">
                            <input type="hidden" name="method" value="tunaicash">
                            <a href="javascript:{}" onclick="onSubmit('1')">
                                <div class="d-flex justify-content-between my-2">
                                    <div class="col-1">
                                        <img class="icon" src="{{ asset('assets/bakid/favicon.png') }}">
                                    </div>
                                    <div class="col-7">
                                        <strong>Bayar Tunai / Di Pondok</strong>
                                    </div>
                                    <span class="primary"> <i class="fas fa-angle-double-right"> </i> </span>
                                </div>
                            </a>
                        </form>
                        <hr>
                    @endhasrole
                    @foreach ($channels as $channel)
                        <form action="{{ route('pay.requestViaAdmin') }}" method="POST"
                            id="my_form{{ $channel->code }}">
                            @csrf
                            <input type="hidden" name="bill_type_id" value="{{ Request::segment(2) }}">
                            <input type="hidden" name="method" value="{{ $channel->code }}">
                            <a href=javascript:{} onclick="onSubmit('{{ $channel->code }}')">
                                <div class="d-flex justify-content-between my-2">
                                    <div class="col-1">
                                        <img style="width:50px;"
                                            src="{{ asset('assets/bakid/icons') . '/' . $channel->code . '.png' }}">
                                    </div>
                                    <div class="col-7">
                                        <strong>{{ $channel->name }}</strong>
                                    </div>
                                    <span class="primary"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                </div>
                            </a>
                        </form>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bayarPendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Kategori</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class=" table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill_types as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>Rp. {{ number_format($category->amount) }}</td>
                                    <td>
                                        <form action="{{ route('pay.requestViaAdmin') }}" method="POST"
                                            id="my_form{{ $category->id }}">
                                            @csrf
                                            <input type="hidden" name="bill_type_id" value="{{ $category->id }}">
                                            <input type="hidden" name="method" value="tunaicash">
                                            <input type="hidden" name="email" value="{{ Session::get('email') }}">
                                            <input type="hidden" name="amount" value="{{ $category->amount }}">
                                            <select name="status">
                                                <option value="paid">Bayar</option>
                                                <option value="unpaid">Lain Waktu</option>
                                            </select>
                                            <a href="javascript:{}" onclick="onSubmit2('{{ $category->id }}')"
                                                class="btn btn-primary btn-sm">
                                                Bayar
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onSubmit(form_id) {
            $('#my_form' + form_id).submit();
        }

        function onSubmit2(form_id) {
            $('#my_form' + form_id).submit();
        }
    </script>
@endsection
