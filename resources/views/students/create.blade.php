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
                aria-selected="true">Data pribadi</a>
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
                    <div class="col-md-6">
                        {{-- <div class="form-group">
                            <label for="daerah" class="form-select-label">status</label>
                            <select name="status" class="form-select">
                                <option>santri</option>
                                <option>alumni</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="email" class="form-control-label ucfirst">email</label>
                            <input name="email" placeholder="email" class="form-control" id="email" type="text"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">nama</label>
                            <input name="nama" placeholder="nama" class="form-control" id="nama" type="text"
                                oninput="this.value = this.value.toUpperCase()" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nik" class="form-control-label ucfirst">nik</label>
                            <input name="nik" placeholder="nik" class="form-control" id="nik" type="text">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="form-control-label ucfirst">tempat_lahir</label>
                            <input name="tempat_lahir" placeholder="tempat_lahir" class="form-control" id="tempat_lahir"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir" class="form-control-label ucfirst">tanggal_lahir</label>
                            <input name="tanggal_lahir" placeholder="tanggal_lahir" class="form-control"
                                id="tanggal_lahir" type="text">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-control-label ucfirst">jenis_kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                <option class="ucfirst">laki-laki</option>
                                <option class="ucfirst">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-control-label ucfirst">alamat</label>
                            <input name="alamat" placeholder="alamat" class="form-control" id="alamat" type="text">
                        </div>
                        <div class="form-group">
                            <label for="rtrw" class="form-control-label ucfirst">rtrw</label>
                            <input name="rtrw" placeholder="rtrw" class="form-control" id="rtrw" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">desa</label>
                            <input name="desa" placeholder="desa" class="form-control" id="desa" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">kecamatan</label>
                            <input name="kecamatan" placeholder="kecamatan" class="form-control" id="kecamatan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">kota</label>
                            <input name="kota" placeholder="kota" class="form-control" id="kota" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">provinsi</label>
                            <input name="provinsi" placeholder="provinsi" class="form-control" id="provinsi" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">kode_pos</label>
                            <input name="kode_pos" placeholder="kode_pos" class="form-control" id="kode_pos" type="text">
                        </div>
                        <div class="form-group">
                            <label for="daerah" class="form-control-label ucfirst">daerah</label>
                            <input name="daerah" placeholder="daerah" class="form-control" id="daerah" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="a_kk" class="form-control-label ucfirst">kk Ayah</label>
                            <input name="a_kk" placeholder="a_kk" class="form-control" id="a_kk" type="text">
                        </div>
                        <div class="form-group">
                            <label for="a_nik" class="form-control-label ucfirst">nik Ayah</label>
                            <input name="a_nik" placeholder="a_nik" class="form-control" id="a_nik" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">nama Ayah</label>
                            <input name="a_nama" placeholder="a_nama" class="form-control" id="a_nama" type="text">
                        </div>
                        <div class="form-group">
                            <label for="a_pendidikan" class="form-control-label ucfirst">Pendidikan Ayah</label>
                            <input name="a_pendidikan" placeholder="a_pendidikan" class="form-control" id="a_pendidikan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="a_pekerjaan" class="form-control-label ucfirst">pekerjaan Ayah</label>
                            <input name="a_pekerjaan" placeholder="a_pekerjaan" class="form-control" id="a_pekerjaan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="a_phone" class="form-control-label ucfirst">phone Ayah</label>
                            <input name="a_phone" placeholder="a_phone" class="form-control" id="a_phone" type="text">
                        </div>
                        <div class="form-group">
                            <label for="a_penghasilan" class="form-control-label ucfirst">penghasilan Ayah</label>
                            <input name="a_penghasilan" placeholder="a_penghasilan" class="form-control"
                                id="a_penghasilan" type="text">
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="a_nik" class="form-control-label ucfirst">nik Ibu</label>
                            <input name="i_nik" placeholder="i_nik" class="form-control" id="i_nik" type="text">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-control-label ucfirst">nama Ibu</label>
                            <input name="i_nama" placeholder="i_nama" class="form-control" id="i_nama" type="text">
                        </div>
                        <div class="form-group">
                            <label for="i_pendidikan" class="form-control-label ucfirst">Pendidikan Ibu</label>
                            <input name="i_pendidikan" placeholder="i_pendidikan" class="form-control" id="i_pendidikan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="i_pekerjaan" class="form-control-label ucfirst">pekerjaan Ibu</label>
                            <input name="i_pekerjaan" placeholder="i_pekerjaan" class="form-control" id="i_pekerjaan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="i_phone" class="form-control-label ucfirst">phone Ibu</label>
                            <input name="i_phone" placeholder="i_phone" class="form-control" id="i_phone" type="text">
                        </div>
                        <div class="form-group">
                            <label for="i_penghasilan" class="form-control-label ucfirst">penghasilan Ibu</label>
                            <input name="i_penghasilan" placeholder="i_penghasilan" class="form-control"
                                id="i_penghasilan" type="text">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="w_hubungan_wali" class="form-control-label ucfirst">hubungan Wali</label>
                            <input name="w_hubungan_wali" placeholder="w_hubungan_wali" class="form-control"
                                id="w_hubungan_wali" type="text">
                        </div>
                        <div class="form-group">
                            <label for="w_nik" class="form-control-label ucfirst">nik Wali</label>
                            <input name="w_nik" placeholder="w_nik" class="form-control" id="w_nik" type="text">
                        </div>
                        <div class="form-group">
                            <label for="w_nama" class="form-control-label ucfirst">nama Wali</label>
                            <input name="w_nama" placeholder="w_nama" class="form-control" id="w_nama" type="text">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="w_pekerjaan" class="form-control-label ucfirst">pekerjaan Wali</label>
                            <input name="w_pekerjaan" placeholder="w_pekerjaan" class="form-control" id="w_pekerjaan"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="w_penghasilan" class="form-control-label ucfirst">penghasilan Wali</label>
                            <input name="w_penghasilan" placeholder="w_penghasilan" class="form-control"
                                id="w_penghasilan" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" id="extab4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nism" class="form-control-label ucfirst">nism</label>
                            <input name="nism" placeholder="nism" class="form-control" id="nism" type="text">
                        </div>
                        <div class="form-group">
                            <label for="kip" class="form-control-label ucfirst">kip</label>
                            <input name="kip" placeholder="kip" class="form-control" id="kip" type="text">
                        </div>
                        <div class="form-group">
                            <label for="pkh" class="form-control-label ucfirst">pkh</label>
                            <input name="pkh" placeholder="pkh" class="form-control" id="pkh" type="text">
                        </div>
                        <div class="form-group">
                            <label for="kks" class="form-control-label ucfirst">kks</label>
                            <input name="kks" placeholder="kks" class="form-control" id="kks" type="text">
                        </div>
                        <div class="form-group">
                            <label for="agama" class="form-control-label ucfirst">agama</label>
                            <input name="agama" placeholder="agama" class="form-control" id="agama" type="text">
                        </div>
                        <div class="form-group">
                            <label for="hobi" class="form-control-label ucfirst">hobi</label>
                            <input name="hobi" placeholder="hobi" class="form-control" id="hobi" type="text">
                        </div>
                        <div class="form-group">
                            <label for="cita_cita" class="form-control-label ucfirst">cita_cita</label>
                            <input name="cita_cita" placeholder="cita_cita" class="form-control" id="cita_cita"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label for="kewarganegaraan" class="form-control-label ucfirst">kewarganegaraan</label>
                            <input name="kewarganegaraan" placeholder="kewarganegaraan" class="form-control"
                                id="kewarganegaraan" type="text">
                        </div>
                        <div class="form-group">
                            <label for="kebutuhan khusus" class="form-control-label ucfirst">kebutuhan khusus</label>
                            <input name="kebutuhan khusus" placeholder="kebutuhan khusus" class="form-control"
                                id="kebutuhan khusus" type="text">
                        </div>
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
                        <div class="form-group">
                            <label for="madin" class="form-control-label ucfirst">madin</label>
                            <input name="madin" placeholder="madin" class="form-control" id="madin" type="text">
                        </div>
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