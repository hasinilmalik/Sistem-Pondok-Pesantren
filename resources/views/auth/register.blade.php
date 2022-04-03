<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/softui') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/softui') }}/img/favicon.png">
    <title>
        Register - Mubakid
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/softui') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/softui') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/softui') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/softui') }}/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">

    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('assets/softui') }}/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Buat akun</h1>
                        <p class="text-lead text-white">Silahkan membuat akun terlabih dahulu agar bisa mendaftar !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" role="form text-left">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        value="" placeholder="Nama lengkap" name="name" aria-label="Name"
                                        aria-describedby="email-addon">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control  @error('name') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Email" name="email" aria-label="Email"
                                        aria-describedby="email-addon">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control  @error('name') is-invalid @enderror"
                                        value="{{ old('password') }}" placeholder="Password" name="password"
                                        aria-label="Password" aria-describedby="password-addon">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Konfirmasi password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check form-check-info text-left">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Saya Setuju<a href="javascript:;" class="text-dark font-weight-bolder"> Kebijakan & ketentuan</a>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Mendaftar</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Masuk</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/softui') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets/softui') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets/softui') }}/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets/softui') }}/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
