<div>
    @push('head')
    @endpush
    @push('foot')
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "ordering": false,
                    responsive: true
                });
                new $.fn.DataTable.FixedHeader(table);
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    @endpush
</div>
