<!--   Core JS Files   -->
@livewireScripts
@stack('foot')
@include('layouts.partials.alert')
<script src="{{ asset('assets/softui') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets/softui') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('assets/softui') }}/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets/softui') }}/js/plugins/smooth-scrollbar.min.js"></script>
<script src="{{ asset('assets/softui') }}/js/plugins/chartjs.min.js"></script>
@include('layouts.partials.chart')
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/softui') }}/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
