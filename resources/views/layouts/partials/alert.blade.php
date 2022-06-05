<script src="{{ asset('assets/bakid/tatajs/tata.js') }}"></script>
@if (Session::has('success'))
    <script>
        toastr.success('Success', {!! \Session::get('success') !!})
    </script>
@endif

@if (session()->has('message'))
    <script>
        toastr.success('Success', {!! \Session::get('success') !!})
    </script>
@endif
