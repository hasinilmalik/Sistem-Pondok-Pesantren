<div>
    {{-- BAGIAN INFO SANTRI --}}
    <div class="row mb-3">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('students.status', 'santri') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Santri Aktif</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($jumlah['total_santri']) }}
                                        {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('students.status', 'baru') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Baru
                                        (Tahun {{ date('Y') }})
                                    </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($jumlah['baru']) }}
                                        {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('students.status', 'alumni') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Alumni</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($jumlah['alumni']) }}
                                        {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Santri Putra</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ number_format($jumlah['jumlah_putra']) }}
                                    {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Santri Putri</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ number_format($jumlah['jumlah_putri']) }}
                                    {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
