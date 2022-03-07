<html>

<head>
    <style>
        #left-panel {
            height: auto;
            width: 24%;
            float: left;
            /* border: 1px solid salmon; */
        }

        #right-panel {
            float: right;
            width: 75%;
            /* border: 1px solid salmon; */
            height: auto;
            padding-top: 320px;

        }

        #fotosiswa {
            margin-top: 550px;
            margin-left: 200px;
            /* border: 1px solid salmon; */
            width: 500px;
            height: 700px;
        }

        #tgl-panel {
            float: right;
            width: 54.7%;
            /* border: 1px solid salmon; */
            height: auto;
        }

        img {
            width: 250px;
        }


        table {
            /* vertical-align: top; */
            font-family: 'gotik';
            text-transform: capitalize;
            font-size: 76px;
            /* font-size: 400%; */
            padding-top: 550px;
            padding-left: 110px;
            padding-bottom: 4px;
            padding-right: 40px;
            line-height: 140%;
        }

        td,
        th {
            text-align: left;
        }

        p {
            text-transform: capitalize;
        }

        img.barcode {
            padding-top: 380px;
            height: 400px;
            width: 700px;
        }

        p {
            margin: 0;
            padding: 0;
        }

        p.nis {
            /* font-weight: bold; */
            font-size: 70px;
            text-align: left;
            padding-left: -14px;
            padding-top: 347px;
            font-family: Arial, Helvetica, sans-serif;
        }

        p.nama {
            /* font-weight: bold; */
            font-size: 70px;
            text-align: left;
            padding-left: -14px;
            padding-top: 40px;
            font-family: Arial, Helvetica, sans-serif;
        }

        p.asrama {
            font-size: 70px;
            text-align: left;
            padding-left: -14px;
            padding-top: 38px;
            font-family: Arial, Helvetica, sans-serif;
            /* padding-top: 350px; */
        }

        p.ortu {
            font-size: 70px;
            text-align: left;
            padding-left: -14px;
            padding-top: 35px;
            font-family: Arial, Helvetica, sans-serif;
            /* padding-top: 350px; */
        }

        p.alamat {
            font-size: 70px;
            text-align: left;
            padding-left: -14px;
            padding-top: 39px;
            font-family: Arial, Helvetica, sans-serif;
            /* padding-top: 350px; */
        }

        p.tgl_cetak {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 40px;
            margin-top: 140px;
        }

    </style>

    <script src="{{ asset('assets/bakid/kartu/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"
        integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA=="
        crossorigin="anonymous"></script>
</head>

<body>
    <input id="btn-Preview-Image" type="button" value="Preview" />
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br />
    <br>


    <?php
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'Sept',
            'Oktober',
            'Nov',
            'Des',
        ];
        $pecahkan = explode('-', $tanggal);
    
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
    
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    
    ?>


    @php
        $tgl = date('d M Y');
        // $tgllhr = date('d M Y', strtotime($data->tanggal_lahir));
    @endphp
    {{-- DISINI KONTENNYA --}}
    <div id="html-content-holder"
        style="background-image:url('{{ url('assets/bakid/kartu/kt-mahrom.png') }}'); width: 3000px;height: 1893px;">
        <div id="left-panel">
            {{-- <img src="{{ url('Foto/Siswa/' . $data->foto_siswa) }}" id="fotosiswa"> --}}
        </div>

        @php
            // $kota = explode(' ', $data->kota);
        @endphp
        <div id="right-panel">
            <p class="nis">{{ str($data->nis) }}</p>
            <p class="nama"> {{ $nama_santri }}</p>
            <p class="asrama">D02</p>
            <p class="ortu">
                {{ str($data->family->a_nama)->title() }}</p>
            <p class="alamat">{{ $alamat }}</p>
        </div>
        <div id="tgl-panel">
            <p class="tgl_cetak">Lumajang, 17 Sept 2000</p>
        </div>

    </div>

    <h3>Preview :</h3>
    <div id="previewImage">
    </div>


    <script>
        $(document).ready(function() {
            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });
            });

            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "kts.png").attr("href", newData);
            });

        });
    </script>
</body>

</html>
