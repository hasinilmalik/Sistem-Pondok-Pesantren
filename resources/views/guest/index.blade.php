<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body>
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
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-control-label ucfirst">nama</label>
                        <input name="nama" placeholder="" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" type="text" oninput="this.value = this.value.toUpperCase()" autofocus required>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="nik" class="form-control-label ucfirst">nik</label>
                            <input name="nik" placeholder="" class="form-control" id="nik" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat_lahir" class="form-control-label ucfirst">tempat_lahir</label>
                            <input name="tempat_lahir" placeholder="" class="form-control" id="tempat_lahir" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir" class="form-control-label ucfirst">tanggal_lahir</label>
                            <input name="tanggal_lahir" placeholder="" class="form-control" id="tanggal_lahir"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" class="form-control-label ucfirst">jenis_kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                <option class="ucfirst">laki-laki</option>
                                <option class="ucfirst">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat" class="form-control-label ucfirst">alamat</label>
                            <input name="alamat" placeholder="" class="form-control" id="alamat" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rtrw" class="form-control-label ucfirst">rtrw</label>
                            <input name="rtrw" placeholder="" class="form-control" id="rtrw" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">desa</label>
                            <input name="desa" placeholder="" class="form-control" id="desa" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">kecamatan</label>
                            <input name="kecamatan" placeholder="" class="form-control" id="kecamatan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">kota</label>
                            <input name="kota" placeholder="" class="form-control" id="kota" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">provinsi</label>
                            <input name="provinsi" placeholder="" class="form-control" id="provinsi" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">kode_pos</label>
                            <input name="kode_pos" placeholder="" class="form-control" id="kode_pos" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="daerah" class="form-control-label ucfirst">daerah</label>
                            <input name="daerah" placeholder="" class="form-control" id="daerah" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="a_kk" class="form-control-label ucfirst">kk Ayah</label>
                            <input name="a_kk" placeholder="" class="form-control" id="a_kk" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="a_nik" class="form-control-label ucfirst">nik Ayah</label>
                            <input name="a_nik" placeholder="" class="form-control" id="a_nik" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">nama Ayah</label>
                            <input name="a_nama" placeholder="" class="form-control" id="a_nama" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="a_pendidikan" class="form-control-label ucfirst">Pendidikan Ayah</label>
                            <input name="a_pendidikan" placeholder="" class="form-control" id="a_pendidikan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="a_pekerjaan" class="form-control-label ucfirst">pekerjaan Ayah</label>
                            <input name="a_pekerjaan" placeholder="" class="form-control" id="a_pekerjaan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="a_phone" class="form-control-label ucfirst">phone Ayah</label>
                            <input name="a_phone" placeholder="" class="form-control" id="a_phone" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="a_penghasilan" class="form-control-label ucfirst">penghasilan Ayah</label>
                            <input name="a_penghasilan" placeholder="" class="form-control" id="a_penghasilan"
                                type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="a_nik" class="form-control-label ucfirst">nik Ibu</label>
                            <input name="i_nik" placeholder="" class="form-control" id="i_nik" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-control-label ucfirst">nama Ibu</label>
                            <input name="i_nama" placeholder="" class="form-control" id="i_nama" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="i_pendidikan" class="form-control-label ucfirst">Pendidikan Ibu</label>
                            <input name="i_pendidikan" placeholder="" class="form-control" id="i_pendidikan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="i_pekerjaan" class="form-control-label ucfirst">pekerjaan Ibu</label>
                            <input name="i_pekerjaan" placeholder="" class="form-control" id="i_pekerjaan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="i_phone" class="form-control-label ucfirst">phone Ibu</label>
                            <input name="i_phone" placeholder="" class="form-control" id="i_phone" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="i_penghasilan" class="form-control-label ucfirst">penghasilan Ibu</label>
                            <input name="i_penghasilan" placeholder="" class="form-control" id="i_penghasilan"
                                type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="w_hubungan_wali" class="form-control-label ucfirst">hubungan Wali</label>
                            <input name="w_hubungan_wali" placeholder="" class="form-control" id="w_hubungan_wali"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="w_nik" class="form-control-label ucfirst">nik Wali</label>
                            <input name="w_nik" placeholder="" class="form-control" id="w_nik" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="w_nama" class="form-control-label ucfirst">nama Wali</label>
                            <input name="w_nama" placeholder="" class="form-control" id="w_nama" type="text">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="w_pekerjaan" class="form-control-label ucfirst">pekerjaan Wali</label>
                            <input name="w_pekerjaan" placeholder="" class="form-control" id="w_pekerjaan" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="w_penghasilan" class="form-control-label ucfirst">penghasilan Wali</label>
                            <input name="w_penghasilan" placeholder="" class="form-control" id="w_penghasilan"
                                type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nism" class="form-control-label ucfirst">nism</label>
                            <input name="nism" placeholder="" class="form-control" id="nism" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kip" class="form-control-label ucfirst">kip</label>
                            <input name="kip" placeholder="" class="form-control" id="kip" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pkh" class="form-control-label ucfirst">pkh</label>
                            <input name="pkh" placeholder="" class="form-control" id="pkh" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kks" class="form-control-label ucfirst">kks</label>
                            <input name="kks" placeholder="" class="form-control" id="kks" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="agama" class="form-control-label ucfirst">agama</label>
                            <input name="agama" placeholder="" class="form-control" id="agama" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="hobi" class="form-control-label ucfirst">hobi</label>
                            <input name="hobi" placeholder="" class="form-control" id="hobi" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cita_cita" class="form-control-label ucfirst">cita_cita</label>
                            <input name="cita_cita" placeholder="" class="form-control" id="cita_cita" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kewarganegaraan" class="form-control-label ucfirst">kewarganegaraan</label>
                            <input name="kewarganegaraan" placeholder="" class="form-control" id="kewarganegaraan"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kebutuhan khusus" class="form-control-label ucfirst">kebutuhan khusus</label>
                            <input name="kebutuhan khusus" placeholder=" khusus" class="form-control"
                                id="kebutuhan khusus" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="status_rumah" class="form-control-label ucfirst">status_rumah</label>
                            <input name="status_rumah" placeholder="" class="form-control" id="status_rumah" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="status_mukim" class="form-control-label ucfirst">status_mukim</label>
                            <input name="status_mukim" placeholder="" class="form-control" id="status_mukim" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lembaga_formal" class="form-control-label ucfirst">lembaga_formal</label>
                            <input name="lembaga_formal" placeholder="" class="form-control" id="lembaga_formal"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="madin" class="form-control-label ucfirst">madin</label>
                            <input name="madin" placeholder="" class="form-control" id="madin" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="sekolah_asal" class="form-control-label ucfirst">sekolah_asal</label>
                            <input name="sekolah_asal" placeholder="" class="form-control" id="sekolah_asal" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat_sekolah_asal" class="form-control-label ucfirst">alamat_sekolah_asal</label>
                            <input name="alamat_sekolah_asal" placeholder="" class="form-control"
                                id="alamat_sekolah_asal" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="npsn_sekolah_asal" class="form-control-label ucfirst">npsn_sekolah_asal</label>
                            <input name="npsn_sekolah_asal" placeholder="" class="form-control" id="npsn_sekolah_asal"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nsm_sekolah_asal" class="form-control-label ucfirst">nsm_sekolah_asal</label>
                            <input name="nsm_sekolah_asal" placeholder="" class="form-control" id="nsm_sekolah_asal"
                                type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_ijazah" class="form-control-label ucfirst">no_ijazah</label>
                            <input name="no_ijazah" placeholder="" class="form-control" id="no_ijazah" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_un" class="form-control-label ucfirst">no_un</label>
                            <input name="no_un" placeholder="" class="form-control" id="no_un" type="text">
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
                    document.getElementById("nextBtn").innerHTML = "Submit";
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

    </body>

    </html>
