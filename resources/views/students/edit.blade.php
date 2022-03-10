@extends('layouts/app')
@if ($forView == 'show')
    @section('judul', 'Show Santri')
@else
    @section('judul', 'Edit Santri')
@endif
@section('prefix', 'Santri')
@push('head')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>
@endpush
@section('content')
    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#extab1">Data pribadi</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#extab2">Orang tua</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#extab3">Wali</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#extab4">Tambahan</a>
            </li>

            @if ($forView == 'edit')
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#foto_tab">Foto</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link"> </a>
                </li>
                <button class="btn btn-primary">Update</button>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane mb-3 fade show active" id="extab1">
                <div class="card" id="extab1">
                    <div class="card-body">
                        @if ($forView == 'show')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                            <a href="javascript:;" class="d-block">
                                                <img src="{{ asset('storage/foto_santri/' . $student->foto) }}"
                                                    class="img-fluid border-radius-lg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                            <a href="javascript:;" class="d-block">
                                                <img src="{{ asset('storage/foto_wali/' . $student->foto_wali) }}"
                                                    class="img-fluid border-radius-lg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="form-group">
                                <label for="daerah" class="form-select-label"
                                >status</label
                                >
                                <select name="status" value="{{ $student->status}}" class="form-select">
                                    <option>santri</option>
                                    <option>alumni</option>
                                </select>
                            </div> --}}
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">nama</label>
                                    <input @if ($forView == 'show') disabled @endif name="nama"
                                        value="{{ $student->nama }}" placeholder="nama" class="form-control" id="nama"
                                        type="text" oninput="this.value = this.value.toUpperCase()" />
                                </div>
                                <div class="form-group">
                                    <label for="nik" class="form-control-label ucfirst">nik</label>
                                    <input @if ($forView == 'show') disabled @endif name="nik"
                                        value="{{ $student->nik }}" placeholder="nik" class="form-control" id="nik"
                                        type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nis" class="form-control-label ucfirst">nis</label>
                                    <input disabled name="nis" value="{{ $student->nis }}" placeholder="nis"
                                        class="form-control" id="nis" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-control-label ucfirst">tempat_lahir</label>
                                    <input @if ($forView == 'show') disabled @endif name="tempat_lahir"
                                        value="{{ $student->tempat_lahir }}" placeholder="tempat_lahir"
                                        class="form-control" id="tempat_lahir" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-control-label ucfirst">tanggal_lahir</label>
                                    <input @if ($forView == 'show') disabled @endif name="tanggal_lahir"
                                        value="{{ $student->tanggal_lahir }}" placeholder="tanggal_lahir"
                                        class="form-control" id="tanggal_lahir" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-control-label ucfirst">jenis_kelamin</label>
                                    <input @if ($forView == 'show') disabled @endif name="jenis_kelamin"
                                        value="{{ $student->jenis_kelamin }}" placeholder="jenis_kelamin"
                                        class="form-control" id="jenis_kelamin" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label ucfirst">alamat</label>
                                    <input @if ($forView == 'show') disabled @endif name="alamat"
                                        value="{{ $student->alamat }}" placeholder="alamat" class="form-control"
                                        id="alamat" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="rtrw" class="form-control-label ucfirst">rtrw</label>
                                    <input @if ($forView == 'show') disabled @endif name="rtrw"
                                        value="{{ $student->rtrw }}" placeholder="rtrw" class="form-control" id="rtrw"
                                        type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">desa</label>
                                    <input @if ($forView == 'show') disabled @endif name="desa"
                                        value="{{ $student->desa }}" placeholder="desa" class="form-control" id="desa"
                                        type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">kecamatan</label>
                                    <input @if ($forView == 'show') disabled @endif name="kecamatan"
                                        value="{{ $student->kecamatan }}" placeholder="kecamatan" class="form-control"
                                        id="kecamatan" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">kota</label>
                                    <input @if ($forView == 'show') disabled @endif name="kota"
                                        value="{{ $student->kota }}" placeholder="kota" class="form-control" id="kota"
                                        type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">provinsi</label>
                                    <input @if ($forView == 'show') disabled @endif name="provinsi"
                                        value="{{ $student->provinsi }}" placeholder="provinsi" class="form-control"
                                        id="provinsi" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">kode_pos</label>
                                    <input @if ($forView == 'show') disabled @endif name="kode_pos"
                                        value="{{ $student->kode_pos }}" placeholder="kode_pos" class="form-control"
                                        id="kode_pos" type="text" />
                                </div>

                                <div class="form-group">
                                    <label for="daerah" class="form-control-label ucfirst">daerah</label>
                                    <input @if ($forView == 'show') disabled @endif name="daerah"
                                        value="{{ $student->daerah }}" placeholder="daerah" class="form-control"
                                        id="daerah" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mb-3 fade show active" id="extab2">
                <div class="card" id="extab2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="a_kk" class="form-control-label ucfirst">kk Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_kk"
                                        value="{{ $student->family->a_kk }}" placeholder="a_kk" class="form-control"
                                        id="a_kk" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="a_nik" class="form-control-label ucfirst">nik Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_nik"
                                        value="{{ $student->family->a_nik }}" placeholder="a_nik" class="form-control"
                                        id="a_nik" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">nama Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_nama"
                                        value="{{ $student->family->a_nama }}" placeholder="a_nama"
                                        class="form-control" id="a_nama" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="a_pekerjaan" class="form-control-label ucfirst">pekerjaan Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_pekerjaan"
                                        value="{{ $student->family->a_pekerjaan }}" placeholder="a_pekerjaan"
                                        class="form-control" id="a_pekerjaan" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="a_phone" class="form-control-label ucfirst">phone Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_phone"
                                        value="{{ $student->family->a_phone }}" placeholder="a_phone"
                                        class="form-control" id="a_phone" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="a_penghasilan" class="form-control-label ucfirst">penghasilan
                                        Ayah</label>
                                    <input @if ($forView == 'show') disabled @endif name="a_penghasilan"
                                        value="{{ $student->family->a_penghasilan }}" placeholder="a_penghasilan"
                                        class="form-control" id="a_penghasilan" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="a_nik" class="form-control-label ucfirst">nik Ibu</label>
                                    <input @if ($forView == 'show') disabled @endif name="i_nik"
                                        value="{{ $student->family->i_nik }}" placeholder="i_nik" class="form-control"
                                        id="i_nik" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label ucfirst">nama Ibu</label>
                                    <input @if ($forView == 'show') disabled @endif name="i_nama"
                                        value="{{ $student->family->i_nama }}" placeholder="i_nama"
                                        class="form-control" id="i_nama" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="i_pekerjaan" class="form-control-label ucfirst">pekerjaan Ibu</label>
                                    <input @if ($forView == 'show') disabled @endif name="i_pekerjaan"
                                        value="{{ $student->family->i_pekerjaan }}" placeholder="i_pekerjaan"
                                        class="form-control" id="i_pekerjaan" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="i_phone" class="form-control-label ucfirst">phone Ibu</label>
                                    <input @if ($forView == 'show') disabled @endif name="i_phone"
                                        value="{{ $student->family->i_phone }}" placeholder="i_phone"
                                        class="form-control" id="i_phone" type="text" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mb-3 fade show active" id="extab3">
                <div class="card" id="extab3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="w_hubungan_wali" class="form-control-label ucfirst">hubungan
                                        Wali</label>
                                    <input @if ($forView == 'show') disabled @endif name="w_hubungan_wali"
                                        value="{{ $student->family->w_hubungan_wali }}" placeholder="w_hubungan_wali"
                                        class="form-control" id="w_hubungan_wali" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="w_nik" class="form-control-label ucfirst">nik Wali</label>
                                    <input @if ($forView == 'show') disabled @endif name="w_nik"
                                        value="{{ $student->family->w_nik }}" placeholder="w_nik" class="form-control"
                                        id="w_nik" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="w_nama" class="form-control-label ucfirst">nama Wali</label>
                                    <input @if ($forView == 'show') disabled @endif name="w_nama"
                                        value="{{ $student->family->w_nama }}" placeholder="w_nama"
                                        class="form-control" id="w_nama" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="w_pekerjaan" class="form-control-label ucfirst">pekerjaan Wali</label>
                                    <input @if ($forView == 'show') disabled @endif name="w_pekerjaan"
                                        value="{{ $student->family->w_pekerjaan }}" placeholder="w_pekerjaan"
                                        class="form-control" id="w_pekerjaan" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="w_penghasilan" class="form-control-label ucfirst">penghasilan
                                        Wali</label>
                                    <input @if ($forView == 'show') disabled @endif name="w_penghasilan"
                                        value="{{ $student->family->w_penghasilan }}" placeholder="w_penghasilan"
                                        class="form-control" id="w_penghasilan" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mb-3 fade show active" id="extab4">
                <div class="card" id="extab4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nism" class="form-control-label ucfirst">nism</label>
                                    <input @if ($forView == 'show') disabled @endif name="nism"
                                        value="{{ $student->addition->nism }}" placeholder="nism" class="form-control"
                                        id="nism" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="kip" class="form-control-label ucfirst">kip</label>
                                    <input @if ($forView == 'show') disabled @endif name="kip"
                                        value="{{ $student->addition->kip }}" placeholder="kip" class="form-control"
                                        id="kip" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="pkh" class="form-control-label ucfirst">pkh</label>
                                    <input @if ($forView == 'show') disabled @endif name="pkh"
                                        value="{{ $student->addition->pkh }}" placeholder="pkh" class="form-control"
                                        id="pkh" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="kks" class="form-control-label ucfirst">kks</label>
                                    <input @if ($forView == 'show') disabled @endif name="kks"
                                        value="{{ $student->addition->kks }}" placeholder="kks" class="form-control"
                                        id="kks" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="agama" class="form-control-label ucfirst">agama</label>
                                    <input @if ($forView == 'show') disabled @endif name="agama"
                                        value="{{ $student->addition->agama }}" placeholder="agama"
                                        class="form-control" id="agama" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="hobi" class="form-control-label ucfirst">hobi</label>
                                    <input @if ($forView == 'show') disabled @endif name="hobi"
                                        value="{{ $student->addition->hobi }}" placeholder="hobi" class="form-control"
                                        id="hobi" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="cita_cita" class="form-control-label ucfirst">cita_cita</label>
                                    <input @if ($forView == 'show') disabled @endif name="cita_cita"
                                        value="{{ $student->addition->cita_cita }}" placeholder="cita_cita"
                                        class="form-control" id="cita_cita" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan" class="form-control-label ucfirst">kewarganegaraan</label>
                                    <input @if ($forView == 'show') disabled @endif name="kewarganegaraan"
                                        value="{{ $student->addition->kewarganegaraan }}" placeholder="kewarganegaraan"
                                        class="form-control" id="kewarganegaraan" type="text" />
                                </div>

                                <div class="form-group">
                                    <label for="kebutuhan_khusus"
                                        class="form-control-label ucfirst">kebutuhan_khusus</label>
                                    <input @if ($forView == 'show') disabled @endif name="kebutuhan_khusus"
                                        value="{{ $student->addition->kebutuhan_khusus }}" placeholder="kebutuhan_khusus"
                                        class="form-control" id="kebutuhan_khusus" type="text" />
                                </div>

                                <div class="form-group">
                                    <label for="status_rumah" class="form-control-label ucfirst">status_rumah</label>
                                    <input @if ($forView == 'show') disabled @endif name="status_rumah"
                                        value="{{ $student->addition->status_rumah }}" placeholder="status_rumah"
                                        class="form-control" id="status_rumah" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_mukim" class="form-control-label ucfirst">status_mukim</label>
                                    <input @if ($forView == 'show') disabled @endif name="status_mukim"
                                        value="{{ $student->addition->status_mukim }}" placeholder="status_mukim"
                                        class="form-control" id="status_mukim" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="lembaga_formal" class="form-control-label ucfirst">lembaga_formal</label>
                                    <input @if ($forView == 'show') disabled @endif name="lembaga_formal"
                                        value="{{ $student->addition->lembaga_formal }}" placeholder="lembaga_formal"
                                        class="form-control" id="lembaga_formal" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="madin" class="form-control-label ucfirst">madin</label>
                                    <input @if ($forView == 'show') disabled @endif name="madin"
                                        value="{{ $student->addition->madin }}" placeholder="madin"
                                        class="form-control" id="madin" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="sekolah_asal" class="form-control-label ucfirst">sekolah_asal</label>
                                    <input @if ($forView == 'show') disabled @endif name="sekolah_asal"
                                        value="{{ $student->addition->sekolah_asal }}" placeholder="sekolah_asal"
                                        class="form-control" id="sekolah_asal" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="alamat_sekolah_asal"
                                        class="form-control-label ucfirst">alamat_sekolah_asal</label>
                                    <input @if ($forView == 'show') disabled @endif name="alamat_sekolah_asal"
                                        value="{{ $student->addition->alamat_sekolah_asal }}"
                                        placeholder="alamat_sekolah_asal" class="form-control" id="alamat_sekolah_asal"
                                        type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="npsn_sekolah_asal"
                                        class="form-control-label ucfirst">npsn_sekolah_asal</label>
                                    <input @if ($forView == 'show') disabled @endif name="npsn_sekolah_asal"
                                        value="{{ $student->addition->npsn_sekolah_asal }}"
                                        placeholder="npsn_sekolah_asal" class="form-control" id="npsn_sekolah_asal"
                                        type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="nsm_sekolah_asal"
                                        class="form-control-label ucfirst">nsm_sekolah_asal</label>
                                    <input @if ($forView == 'show') disabled @endif name="nsm_sekolah_asal"
                                        value="{{ $student->addition->nsm_sekolah_asal }}" placeholder="nsm_sekolah_asal"
                                        class="form-control" id="nsm_sekolah_asal" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="no_ijazah" class="form-control-label ucfirst">no_ijazah</label>
                                    <input @if ($forView == 'show') disabled @endif name="no_ijazah"
                                        value="{{ $student->addition->no_ijazah }}" placeholder="no_ijazah"
                                        class="form-control" id="no_ijazah" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="no_un" class="form-control-label ucfirst">no_un</label>
                                    <input @if ($forView == 'show') disabled @endif name="no_un"
                                        value="{{ $student->addition->no_un }}" placeholder="no_un"
                                        class="form-control" id="no_un" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mb-3 fade show active" id="foto_tab">
                <div class="card" id="foto_tab">
                    <div class="card-body">
                        @if ($forView == 'edit')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                            <img src="{{ asset('storage/foto_santri/' . $student->foto) }}"
                                                class="img-fluid border-radius-lg">
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="fosan" class="form-label">Foto baru Santri</label>
                                                    <input class="form-control" type="file" id="fosan" name="foto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                            <img src="{{ asset('storage/foto_wali/' . $student->foto_wali) }}"
                                                class="img-fluid border-radius-lg">
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="fosan" class="form-label">Foto Baru Wali</label>
                                                    <input class="form-control" type="file" id="fosan" name="foto_wali">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
