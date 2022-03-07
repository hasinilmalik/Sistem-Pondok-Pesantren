<html>

<head>
    <style>
        div.a {
            float: left;
            display: inline-block;
            width: 700px;
            padding: 5px;
            /* border: 1px solid blue; */
        }

        div.b {
            float: left;
            display: inline-block;
            width: 1450px;
            /* border: 1px solid blue; */
            padding-top: 665;
        }

        div.c {
            float: left;
            display: inline-block;
            /* width: 700px; */
            /* height: 100%; */
            /* border: 1px solid blue; */
            padding-top: 773;
            padding-left: 36;
        }


        #qrcode {
            padding-top: 1350px;
            padding-left: 250px;
        }

        #tanggal {
            padding-top: 1050px;
            padding-left: 250px;
        }


        .nis {
            padding-left: 35px;
            text-align: left;
            font-family: Arial,
                Helvetica,
                sans-serif;
            font-size: 70px;
        }

        .nama {
            font-family: Arial,
                Helvetica,
                sans-serif;
            font-size: 70px;
            padding-left: 35px;
            text-align: left;
            padding-top: 40px;
        }

        .asrama {
            font-family: Arial,
                Helvetica,
                sans-serif;
            font-size: 70px;
            padding-left: 35px;
            text-align: left;
            padding-top: 40px;
        }

        .ortu {
            font-family: Arial,
                Helvetica,
                sans-serif;
            font-size: 70px;
            padding-left: 35px;
            text-align: left;
            padding-top: 38px;
        }

        .alamat {
            font-family: Arial,
                Helvetica,
                sans-serif;
            font-size: 70px;
            padding-left: 35px;
            text-align: left;
            padding-top: 38px;
        }

        .tgl_cetak {
            font-family: Arial, Helvetica, sans-serif;
            text-align: left;
            font-size: 40px;
            padding-top: 140px;
        }

        /* .column {
            float: left;
            width: 33.33%;
            padding: 15px;
        } */

        img.foto_wali {
            padding-top: 15px;
            padding-left: 30px;
            width: 600px;
            /* border-radius: 25px; */
            /* box-shadow: 10px 10px 10px grey; */
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
        <div class="a">
            <div id="qrcode">{{ QrCode::size(300)->generate($data->nis) }}</div>
        </div>
        <div class="b">
            <div class="nis">{{ str($data->nis) }}</div>
            <div class="nama"> {{ $nama_santri }}</div>
            <div class="asrama">D02</div>
            <div class="ortu">
                {{ str($data->family->a_nama)->title() }}
            </div>
            <div class="alamat">{{ $alamat }}</div>
            @php
                \Carbon\Carbon::setLocale('id');
                App::setlocale('id');
            @endphp
            <div class="tgl_cetak" style="padding-left: 648px;">
                Lumajang, {{ \Carbon\Carbon::now()->format('d M Y') }}</div>
        </div>
        <div class="c">
            <img class="foto_wali" src="{{ URL::to('/') }}/assets/bakid/kartu/contoh_foto.jpg">
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