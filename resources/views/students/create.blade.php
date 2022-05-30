@extends('layouts/app')
@section('judul', 'Tambah Santri')
@section('prefix', 'Santri')
@push('head')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("active");
            });
        });
    </script>
@endpush
@section('content')
    <ul class="nav nav-tabs mb-3" id="mytab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#extab1" role="tab" aria-controls="extab1"
                aria-selected="true">Data pribadi </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#extab2" role="tab" aria-controls="extab2"
                aria-selected="false">Orang tua</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#extab3" role="tab" aria-controls="extab2"
                aria-selected="false">Wali</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-4" data-mdb-toggle="tab" href="#extab4" role="tab" aria-controls="extab4"
                aria-selected="false">Tambahan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-5" data-mdb-toggle="tab" href="#extab5" role="tab" aria-controls="extab5"
                aria-selected="false">Foto</a>
        </li>
    </ul>
    <form action="{{ route('students.store') }}" method="POST" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3" id="extab1">
            <div class="card-body">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert">
                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <x-form.input name="email" type="text" value="{{ old('email') }}" />

                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">nama</label>
                            <input name="nama" placeholder="nama" class="form-control" id="nama" type="text"
                                oninput="this.value = this.value.toUpperCase()" autofocus>
                        </div>

                        <x-form.input name="nik" type="number" value="{{ old('nik') }}" />
                        <x-form.input name="tempat_lahir" type="text" value="{{ old('tempat_lahir') }}" />
                        <x-form.input name="tanggal_lahir" type="date" value="{{ old('tanggal_lahir') }}" />
                        <x-form.input name="alamat" type="text" value="{{ old('alamat') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-form.input name="rtrw" label="Rt/Rw" type="text" value="{{ old('rtrw') }}"
                            placeholder="RT/RW" />
                        <livewire:ui.pilih-alamat />
                        {{-- <x-form.input name="desa" type="text" value="{{ old('desa') }}" />
                        <x-form.input name="kecamatan" type="text" value="{{ old('kecamatan') }}" />
                        <x-form.input name="kota" type="text" value="{{ old('kota') }}" />
                        <x-form.input name="provinsi" type="text" value="{{ old('provinsi') }}" /> --}}
                        <x-form.input name="kode_pos" type="number" value="{{ old('kode_pos') }}" />
                        <livewire:choose-dormitory />
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input name="a_kk" label="No KK (Kartu Keluarga)" type="number"
                            value="{{ old('a_kk') }}" />
                        <x-form.input name="a_nik" label="NIK (No KTP)" type="number" value="{{ old('a_nik') }}" />
                        <x-form.input name="a_nama" label="Nama Ayah" type="text" value="{{ old('a_nama') }}" />
                        <x-form.input name="a_phone" label="No Hp/Wa Ayah" type="number" value="{{ old('a_phone') }}" />
                        <x-form.select name="a_pendidikan" label="Pendidikan Ayah" :options="[
                            'Tidak memiliki pendidikan formal',
                            'SD/MI/sederajat',
                            'SMP/MTs/sederajat',
                            'SMA/MA/SMK/sederajat',
                            'D1',
                            'D2',
                            'D3',
                            'D4/S1',
                            'S2',
                            'S3',
                        ]" />
                        <x-form.select name="a_pekerjaan" label="Pekerjaan Ayah" :options="[
                            'Tidak Bekerja',
                            'Nelayan',
                            'Petani',
                            'Peternak',
                            'PNS/TNI/Polri',
                            'Karyawan Swasta',
                            'Pedagang Kecil',
                            'Pedagang Besar',
                            'Wiraswasta',
                            'Wirausaha',
                            'Buruh',
                            'Pensiunan',
                            'Tenaga Kerja Indonesia',
                            'Tidak dapat diterapkan',
                            'Sudah Meninggal',
                            'Lainnya',
                        ]" />
                        <x-form.select name="a_penghasilan" label="Penghasilan Ayah" :options="[
                            'Tidak berpenghasilan',
                            'kurang dari Rp. 1.000.000',
                            'Rp. 1.000.000 - Rp. 2.000.000',
                            'lebh dari Rp. 2.000.000',
                            'kurang dari Rp. 500.000',
                            'Rp. 500.000 - Rp. 999.000',
                            'Rp. 1.000.000 - Rp. 1.999.000',
                            'Rp. 2.000.000 - Rp. 4.999.000',
                            'Rp. 5.000.000 - Rp. 20.000.000',
                            'Lebih dari Rp. 20.000.000',
                            'Lainnya',
                        ]" />
                    </div>
                    <div class="col-md-6">
                        <x-form.input name="i_nik" label="NIK Ibu (No KTP)" type="number" value="{{ old('a_nik') }}" />
                        <x-form.input name="i_nama" label="Nama Ibu" type="text" value="{{ old('a_nama') }}" />
                        <x-form.input name="i_phone" label="No Hp/Wa Ibu" type="number" value="{{ old('a_phone') }}" />
                        <x-form.select name="i_pendidikan" label="Pendidikan Ibu" :options="[
                            'Tidak memiliki pendidikan formal',
                            'SD/MI/sederajat',
                            'SMP/MTs/sederajat',
                            'SMA/MA/SMK/sederajat',
                            'D1',
                            'D2',
                            'D3',
                            'D4/S1',
                            'S2',
                            'S3',
                        ]" />
                        <x-form.select name="i_pekerjaan" label="Pekerjaan Ibu" :options="[
                            'Tidak Bekerja',
                            'Nelayan',
                            'Petani',
                            'Peternak',
                            'PNS/TNI/Polri',
                            'Karyawan Swasta',
                            'Pedagang Kecil',
                            'Pedagang Besar',
                            'Wiraswasta',
                            'Wirausaha',
                            'Buruh',
                            'Pensiunan',
                            'Tenaga Kerja Indonesia',
                            'Tidak dapat diterapkan',
                            'Sudah Meninggal',
                            'Lainnya',
                        ]" />
                        <x-form.select name="i_penghasilan" label="Penghasilan Ibu" :options="[
                            'Tidak berpenghasilan',
                            'kurang dari Rp. 1.000.000',
                            'Rp. 1.000.000 - Rp. 2.000.000',
                            'lebh dari Rp. 2.000.000',
                            'kurang dari Rp. 500.000',
                            'Rp. 500.000 - Rp. 999.000',
                            'Rp. 1.000.000 - Rp. 1.999.000',
                            'Rp. 2.000.000 - Rp. 4.999.000',
                            'Rp. 5.000.000 - Rp. 20.000.000',
                            'Lebih dari Rp. 20.000.000',
                            'Lainnya',
                        ]" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input label="Hubungan Wali" name="w_hubungan_wali"
                            value="{{ old('w_hubungan_wali') }}" />
                        <x-form.input label="NIK Wali" name="w_nik" value="{{ old('w_nik') }}" />
                        <x-form.input label="Nama Wali" name="w_nama" value="{{ old('w_nama') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-form.select name="w_pekerjaan" label="Pekerjaan Wali" :options="[
                            'Tidak Bekerja',
                            'Nelayan',
                            'Petani',
                            'Peternak',
                            'PNS/TNI/Polri',
                            'Karyawan Swasta',
                            'Pedagang Kecil',
                            'Pedagang Besar',
                            'Wiraswasta',
                            'Wirausaha',
                            'Buruh',
                            'Pensiunan',
                            'Tenaga Kerja Indonesia',
                            'Tidak dapat diterapkan',
                            'Sudah Meninggal',
                            'Lainnya',
                        ]" />
                        <x-form.select name="w_penghasilan" label="Penghasilan Wali" :options="[
                            'Tidak berpenghasilan',
                            'kurang dari Rp. 1.000.000',
                            'Rp. 1.000.000 - Rp. 2.000.000',
                            'lebh dari Rp. 2.000.000',
                            'kurang dari Rp. 500.000',
                            'Rp. 500.000 - Rp. 999.000',
                            'Rp. 1.000.000 - Rp. 1.999.000',
                            'Rp. 2.000.000 - Rp. 4.999.000',
                            'Rp. 5.000.000 - Rp. 20.000.000',
                            'Lebih dari Rp. 20.000.000',
                            'Lainnya',
                        ]" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input name="nism" label="No NISM (Nomor Induk Siswa Madrasah)" type="number"
                            value="{{ old('nism') }}" />
                        <x-form.input name="kip" label="No KIP (Kartu Indonesia Pintar)" type="number"
                            value="{{ old('kip') }}" />
                        <x-form.input name="pkh" label="No PKH (Program Keluarga Harapan)" type="number"
                            value="{{ old('pkh') }}" />
                        <x-form.input name="kks" label="No KKS (Kartu keluarga Sejahtera)" type="number"
                            value="{{ old('kks') }}" />
                        <x-form.select name="agama" label="Agama" :options="['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu', 'Lainnya']" />
                        <x-form.select name="hobi" label="Hobi" :options="['olahraga', 'kesenian', 'membaca', 'menulis', 'jalan-jalan', 'lainnya']" />
                        <x-form.select name="cita_cita" label="cita_cita" :options="[
                            'lainnya',
                            'PNS',
                            'TNI/Polri',
                            'Guru/Dosen',
                            'Dokter',
                            'Politikus',
                            'Wiraswasta',
                            'Seniman/Artis',
                            'Ilmuwan',
                            'Agamawan',
                        ]" />
                        <x-form.select name="kewarganegaraan" label="Kewarganegaraan" :options="['WNI', 'WNA']" />
                        <x-form.select name="kebutuhan_khusus" label="Kebutuhan Khusus" :options="[
                            'Tidak',
                            'Netra',
                            'Rungu',
                            'Grahita Ringan',
                            'Grahita Sedang',
                            'Daksa Ringan',
                            'Daksa Sedang',
                            'Laras',
                            'Wicara',
                            'Tuna Ganda',
                            'Hiper Aktif',
                            'Cerdas Istimewa',
                            'Bakat Istimewa',
                            'Kesulitan Belajar',
                            'Narkoba',
                            'Indigo',
                            'Down Sindrome',
                            'Autis',
                            'Lainnya',
                        ]" />
                        <div class="form-group">
                            <label for="status_rumah" class="form-control-label ucfirst">status_rumah</label>
                            <input name="status_rumah" placeholder="status_rumah" class="form-control" id="status_rumah"
                                type="text">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="status_mukim" class="form-control-label ucfirst">status_mukim</label>
                            <input name="status_mukim" placeholder="status_mukim" class="form-control" id="status_mukim"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="lembaga_formal" class="form-control-label ucfirst">lembaga_formal</label>
                            <input name="lembaga_formal" placeholder="lembaga_formal" class="form-control"
                                id="lembaga_formal" type="text">
                        </div>
                        <livewire:choose-madin />
                        <div class="form-group">
                            <label for="sekolah_asal" class="form-control-label ucfirst">sekolah_asal</label>
                            <input name="sekolah_asal" placeholder="sekolah_asal" class="form-control" id="sekolah_asal"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="alamat_sekolah_asal" class="form-control-label ucfirst">alamat_sekolah_asal</label>
                            <input name="alamat_sekolah_asal" placeholder="alamat_sekolah_asal" class="form-control"
                                id="alamat_sekolah_asal" type="text">
                        </div>
                        <div class="form-group">
                            <label for="npsn_sekolah_asal" class="form-control-label ucfirst">npsn_sekolah_asal</label>
                            <input name="npsn_sekolah_asal" placeholder="npsn_sekolah_asal" class="form-control"
                                id="npsn_sekolah_asal" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nsm_sekolah_asal" class="form-control-label ucfirst">nsm_sekolah_asal</label>
                            <input name="nsm_sekolah_asal" placeholder="nsm_sekolah_asal" class="form-control"
                                id="nsm_sekolah_asal" type="text">
                        </div>
                        <div class="form-group">
                            <label for="no_ijazah" class="form-control-label ucfirst">no_ijazah</label>
                            <input name="no_ijazah" placeholder="no_ijazah" class="form-control" id="no_ijazah"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="no_un" class="form-control-label ucfirst">no_un</label>
                            <input name="no_un" placeholder="no_un" class="form-control" id="no_un" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="fosan" class="form-label">Foto Santri</label>
                                <input class="form-control" type="file" id="fosan" name="foto">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fowa" class="form-label">Foto Ayah/Wali</label>
                            <input class="form-control" type="file" id="fowa" name="foto_wali">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
