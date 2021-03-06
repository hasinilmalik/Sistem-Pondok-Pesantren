<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" value="{{ old('viewport') }}" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h3 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: grey;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        .ucfirst {
            text-transform: lowercase;
        }

        .ucfirst:first-letter {
            text-transform: uppercase;
        }

    </style>
    <style>
        .lds-heart {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            transform: rotate(45deg);
            transform-origin: 40px 40px;
        }

        .lds-heart div {
            top: 32px;
            left: 32px;
            position: absolute;
            width: 32px;
            height: 32px;
            background: #fff;
            animation: lds-heart 1.2s infinite cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        .lds-heart div:after,
        .lds-heart div:before {
            content: " ";
            position: absolute;
            display: block;
            width: 32px;
            height: 32px;
            background: #fff;
        }

        .lds-heart div:before {
            left: -24px;
            border-radius: 50% 0 0 50%;
        }

        .lds-heart div:after {
            top: -24px;
            border-radius: 50% 50% 0 0;
        }

        @keyframes lds-heart {
            0% {
                transform: scale(0.95);
            }

            5% {
                transform: scale(1.1);
            }

            39% {
                transform: scale(0.85);
            }

            45% {
                transform: scale(1);
            }

            60% {
                transform: scale(0.95);
            }

            100% {
                transform: scale(0.9);
            }
        }

        .full_layar {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 9999;
            width: 100%;
            height: 100%;
            opacity: 0.75;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @stack('head')
</head>

<body>
    <div wire:loading>
        <div class="full_layar">
            <div class="lds-heart">
                <div></div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pendaftaran</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->name }}</a>
                    </li>
                </ul>
                {{-- <form action="{{ route('logout') }}">
                    <button class="btn btn-outline-success" type="submit">Keluar</button>
                </form> --}}
            </div>
        </div>
    </nav>
    <form id="regForm" action="{{ route('guest.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="tab">
            <div class="row">
                @error('user_id')
                    <span class="text-danger text-center">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-control-label ucfirst">nama</label>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input name="nama" value="{{ Auth::user()->name }}" placeholder=""
                            class="form-control @error('nama') is-invalid @enderror" id="nama" type="text"
                            oninput="this.value = this.value.toUpperCase()" value="{{ old('nama') }}" autofocus
                            required>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nik" class="form-control-label ucfirst">nik</label>
                        <input name="nik" value="{{ old('nik') }}" placeholder=""
                            class="form-control @error('nik') is-invalid @enderror" id="nik" type="number">
                        @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tempat_lahir" class="form-control-label ucfirst">tempat lahir</label>
                        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder=""
                            class="form-control" id="tempat_lahir" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir" class="form-control-label ucfirst">tanggal lahir</label>
                        <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder=""
                            class="form-control" id="tanggal_lahir" type="date">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-control-label ucfirst">alamat</label>
                        <input name="alamat" value="{{ old('alamat') }}" placeholder="" class="form-control"
                            id="alamat" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="rtrw" class="form-control-label ucfirst">rt/rw</label>
                        <input name="rtrw" value="{{ old('rtrw') }}" placeholder="" class="form-control" id="rtrw"
                            type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama" class="form-control-label ucfirst">kode pos</label>
                        <input name="kode_pos" value="{{ old('kode_pos') }}" placeholder="" class="form-control"
                            id="kode_pos" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <livewire:ui.pilih-alamat />
                    <livewire:choose-dormitory />
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="a_kk" class="form-control-label ucfirst">Nomor KK (Kartu Keluarga)</label>
                        <input name="a_kk" value="{{ old('a_kk') }}" placeholder="" class="form-control" id="a_kk"
                            type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="a_nik" class="form-control-label ucfirst">nik Ayah</label>
                        <input name="a_nik" value="{{ old('a_nik') }}" placeholder="" class="form-control"
                            id="a_nik" type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama" class="form-control-label ucfirst">nama Ayah</label>
                        <input name="a_nama" value="{{ old('a_nama') }}" placeholder="" class="form-control"
                            id="a_nama" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="sfgfsgdsg" class="form-control-label ucfirst">Pendidikan Ayah</label>
                        <select name="a_pendidikan" id="sfgfsgdsg" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak memiliki pendidikan formal</option>
                            <option>sd/mi/sederajat</option>
                            <option>smp/mts/sederajat</option>
                            <option>sma/ma/smk/sederajat</option>
                            <option>d1</option>
                            <option>d2</option>
                            <option>d3</option>
                            <option>d4/s1</option>
                            <option>s2</option>
                            <option>s3</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="aaasasa" class="form-control-label ucfirst">pekerjaan Ayah</label>
                        <select name="a_pekerjaan" id="aaasasa" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak bekerja</option>
                            <option>buruh (tani/pabrik/bangunan)</option>
                            <option>dokter/bidan/perawat</option>
                            <option>guru/dosen</option>
                            <option>nelayan</option>
                            <option>pedagang</option>
                            <option>pegawai swasta</option>
                            <option>pengacara/hakim/jaksa/notaris</option>
                            <option>pensiunan</option>
                            <option>petani/peternak</option>
                            <option>pilot/pramugari</option>
                            <option>pns</option>
                            <option>politikus</option>
                            <option>seniman/pelukis/artis/sejenis</option>
                            <option>sopir,masinis,kondektur</option>
                            <option>tni/polisi</option>
                            <option>wiraswasta</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="a_phone" class="form-control-label ucfirst">Nomer Hp/Wa Ayah</label>
                        <input name="a_phone" value="{{ old('a_phone') }}" placeholder="" class="form-control"
                            id="a_phone" type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="546dfdg" class="form-control-label ucfirst">penghasilan Ayah</label>
                        <select name="a_penghasilan" id="546dfdg" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak berpenghasilan</option>
                            <option>kurang dari 500.000</option>
                            <option>500.000 - 1 juta</option>
                            <option>1 juta - 2 juta</option>
                            <option>2 juta - 3 juta</option>
                            <option>3 juta - 4 juta</option>
                            <option>4 juta - 5 juta</option>
                            <option>lebih dari 5 juta</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="a_nik" class="form-control-label ucfirst">nik Ibu</label>
                        <input name="i_nik" value="{{ old('i_nik') }}" placeholder="" class="form-control"
                            id="i_nik" type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama" class="form-control-label ucfirst">nama Ibu</label>
                        <input name="i_nama" value="{{ old('i_nama') }}" placeholder="" class="form-control"
                            id="i_nama" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="mmmvcxgb" class="form-control-label ucfirst">Pendidikan Ibu</label>
                        <select name="i_pendidikan" id="mmmvcxgb" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak memiliki pendidikan formal</option>
                            <option>sd/mi/sederajat</option>
                            <option>smp/mts/sederajat</option>
                            <option>sma/ma/smk/sederajat</option>
                            <option>d1</option>
                            <option>d2</option>
                            <option>d3</option>
                            <option>d4/s1</option>
                            <option>s2</option>
                            <option>s3</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fsgdgsdgsdgsdg" class="form-control-label ucfirst">pekerjaan Ibu</label>
                        <select name="i_pekerjaan" id="fsgdgsdgsdgsdg" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak bekerja</option>
                            <option>buruh (tani/pabrik/bangunan)</option>
                            <option>dokter/bidan/perawat</option>
                            <option>guru/dosen</option>
                            <option>nelayan</option>
                            <option>pedagang</option>
                            <option>pegawai swasta</option>
                            <option>pengacara/hakim/jaksa/notaris</option>
                            <option>pensiunan</option>
                            <option>petani/peternak</option>
                            <option>pilot/pramugari</option>
                            <option>pns</option>
                            <option>politikus</option>
                            <option>seniman/pelukis/artis/sejenis</option>
                            <option>sopir,masinis,kondektur</option>
                            <option>tni/polisi</option>
                            <option>wiraswasta</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="i_phone" class="form-control-label ucfirst">phone Ibu</label>
                        <input name="i_phone" value="{{ old('i_phone') }}" placeholder="" class="form-control"
                            id="i_phone" type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="sfsdfasfd" class="form-control-label ucfirst">penghasilan Ibu</label>
                        <select name="i_penghasilan" id="sfsdfasfd" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak berpenghasilan</option>
                            <option>kurang dari 500.000</option>
                            <option>500.000 - 1 juta</option>
                            <option>1 juta - 2 juta</option>
                            <option>2 juta - 3 juta</option>
                            <option>3 juta - 4 juta</option>
                            <option>4 juta - 5 juta</option>
                            <option>lebih dari 5 juta</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="w_hubungan_wali" class="form-control-label ucfirst">hubungan Wali</label>
                        <select name="w_hubungan_wali" id="w_hubungan_wali" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>Kakek/nenek</option>
                            <option>Paman/bibi</option>
                            <option>kakak</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="w_nik" class="form-control-label ucfirst">nik Wali</label>
                        <input name="w_nik" value="{{ old('w_nik') }}" placeholder="" class="form-control"
                            id="w_nik" type="number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="w_nama" class="form-control-label ucfirst">nama Wali</label>
                        <input name="w_nama" value="{{ old('w_nama') }}" placeholder="" class="form-control"
                            id="w_nama" type="text">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="w_fsgsdg" class="form-control-label ucfirst">pekerjaan Wali</label>
                        <select name="w_pekerjaan" id="fsgsdg" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak bekerja</option>
                            <option>buruh (tani/pabrik/bangunan)</option>
                            <option>dokter/bidan/perawat</option>
                            <option>guru/dosen</option>
                            <option>nelayan</option>
                            <option>pedagang</option>
                            <option>pegawai swasta</option>
                            <option>pengacara/hakim/jaksa/notaris</option>
                            <option>pensiunan</option>
                            <option>petani/peternak</option>
                            <option>pilot/pramugari</option>
                            <option>pns</option>
                            <option>politikus</option>
                            <option>seniman/pelukis/artis/sejenis</option>
                            <option>sopir,masinis,kondektur</option>
                            <option>tni/polisi</option>
                            <option>wiraswasta</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sdfgdghhee" class="form-control-label ucfirst">penghasilan Wali</label>
                        <select name="w_penghasilan" id="sdfgdghhee" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tidak berpenghasilan</option>
                            <option>kurang dari 500.000</option>
                            <option>500.000 - 1 juta</option>
                            <option>1 juta - 2 juta</option>
                            <option>2 juta - 3 juta</option>
                            <option>3 juta - 4 juta</option>
                            <option>4 juta - 5 juta</option>
                            <option>lebih dari 5 juta</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-md-6">
                    {{-- <div class="form-group mb-3">
                        <label for="daerah" class="form-control-label ucfirst">Asrama</label>
                        <input name="daerah" oninput="this.value = this.value.toUpperCase()"
                            value="{{ old('daerah') }}" placeholder="" class="form-control" id="daerah"
                            type="text">
                    </div> --}}
                    <div class="form-group mb-3">
                        <label for="nism" class="form-control-label ucfirst">nism</label>
                        <input name="nism" value="{{ old('nism') }}" placeholder="" class="form-control" id="nism"
                            type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kip" class="form-control-label ucfirst">kip</label>
                        <input name="kip" value="{{ old('kip') }}" placeholder="" class="form-control" id="kip"
                            type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pkh" class="form-control-label ucfirst">pkh</label>
                        <input name="pkh" value="{{ old('pkh') }}" placeholder="" class="form-control" id="pkh"
                            type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kks" class="form-control-label ucfirst">kks</label>
                        <input name="kks" value="{{ old('kks') }}" placeholder="" class="form-control" id="kks"
                            type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="agama" class="form-control-label ucfirst">agama</label>
                        <select name="agama" id="agama" class="form-select">
                            <option>Islam</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hobi" class="form-control-label ucfirst">hobi</label>
                        <select name="hobi" id="hobi" class="form-select">
                            <option value="" disabled selected>Pilih</option>
                            <option>olahraga</option>
                            <option>kesenian</option>
                            <option>membaca</option>
                            <option>menulis</option>
                            <option>jalan-jalan</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cita_cita" class="form-control-label ucfirst">cita cita</label>
                        <select name="cita_cita" id="cita_cita" class="form-select">
                            <option value="" disabled selected>Pilih</option>
                            <option>lainnya</option>
                            <option>PNS</option>
                            <option>TNI/Polri</option>
                            <option>Guru/Dosen</option>
                            <option>Dokter</option>
                            <option>Politikus</option>
                            <option>Wiraswasta</option>
                            <option>Seniman/Artis</option>
                            <option>Ilmuwan</option>
                            <option>Agamawan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kewarganegaraan" class="form-control-label ucfirst">kewarganegaraan</label>
                        <select name="kewarganegaraan" id="kewarganegaraan" class="form-select">
                            <option selected>WNI</option>
                            <option>WNA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kebutuhan sgd" class="form-control-label ucfirst">kebutuhan khusus</label>
                        <select name="kebutuhan_khusus" id="sdgsdg" class="form-select">
                            <option value="" disabled selected>Pilih</option>
                            <option value="">Tidak ada</option>
                            <option>tuna netra</option>
                            <option>tuna rungu</option>
                            <option>tuna daksa</option>
                            <option>tuna grahita</option>
                            <option>tuna laras</option>
                            <option>tuna wicara</option>
                            <option>bakat istimewa</option>
                            <option>kesulitan belajar</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="status_rumah" class="form-control-label ucfirst">status rumah</label>
                        <select name="status_rumah" id="status_rumah" class="form-select">
                            <option value="" selected disabled>Pilih</option>
                            <option>tinggal dengan orang tua/wali</option>
                            <option>ikut saudara/kerabat</option>
                            <option>kontrak/kost</option>
                            <option>rumah singgah</option>
                            <option>panti asuhan</option>
                            <option>asrama bukan milik lembaga</option>
                            <option>lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status_mukim" class="form-control-label ucfirst">status mukim</label>
                        <input name="status_mukim" value="{{ old('status_mukim') }}" placeholder=""
                            class="form-control" id="status_mukim" type="text">
                    </div>
                    <livewire:choose-madin />
                    <div class="form-group mb-3">
                        <label for="sekolah_asal" class="form-control-label ucfirst">sekolah asal</label>
                        <input name="sekolah_asal" value="{{ old('sekolah_asal') }}" placeholder=""
                            class="form-control" id="sekolah_asal" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat_sekolah_asal" class="form-control-label ucfirst">alamat sekolah asal</label>
                        <input name="alamat_sekolah_asal" value="{{ old('alamat_sekolah_asal') }}" placeholder=""
                            class="form-control" id="alamat_sekolah_asal" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="npsn_sekolah_asal" class="form-control-label ucfirst">npsn sekolah asal</label>
                        <input name="npsn_sekolah_asal" value="{{ old('npsn_sekolah_asal') }}" placeholder=""
                            class="form-control" id="npsn_sekolah_asal" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nsm_sekolah_asal" class="form-control-label ucfirst">nsm_sekolah_asal</label>
                        <input name="nsm_sekolah_asal" value="{{ old('nsm_sekolah_asal') }}" placeholder=""
                            class="form-control" id="nsm_sekolah_asal" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_ijazah" class="form-control-label ucfirst">no ijazah</label>
                        <input name="no_ijazah" value="{{ old('no_ijazah') }}" placeholder="" class="form-control"
                            id="no_ijazah" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_un" class="form-control-label ucfirst">no un</label>
                        <input name="no_un" value="{{ old('no_un') }}" placeholder="" class="form-control"
                            id="no_un" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        $(document).ready(function() {
            // $("#formal").select2({
            //     placeholder: "Pilih lembaga formal"
            // });

            // $("#madin").select2({
            //     placeholder: "Pilih Madin"
            // });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Kirim";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        // function validateForm() {
        //     // This function deals with validation of the form fields
        //     var x, y, i, valid = true;
        //     x = document.getElementsByClassName("tab");
        //     y = x[currentTab].getElementsByTagName("input");
        //     // A loop that checks every input field in the current tab:
        //     for (i = 0; i < y.length; i++) {
        //         // If a field is empty...
        //         if (y[i].value == "") {
        //             // add an "invalid" class to the field:
        //             y[i].className += " invalid";
        //             // and set the current valid status to false
        //             valid = false;
        //         }
        //     }
        //     // If the valid status is true, mark the step as finished and valid:
        //     if (valid) {
        //         document.getElementsByClassName("step")[currentTab].className += " finish";
        //     }
        //     return valid; // return the valid status
        // }
        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            // x = document.getElementsByClassName("tab");
            x = true;
            // y = x[currentTab].getElementsByTagName("input");
            y = true;
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    @livewireScripts
    @stack('foot')
</body>

</html>
