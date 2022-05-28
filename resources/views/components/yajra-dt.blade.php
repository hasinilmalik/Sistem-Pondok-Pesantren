<div>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    @endpush
    @push('foot')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#student-table').DataTable({
                    dom: 'lBfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'csv', 'print'
                    ],
                    processing: true,
                    serverSide: true,
                    'bsort': false,
                    responsive: true,
                    lengthChange: false,
                    lengthMenu: [10, 25, 50, 100],
                    pageLength: 20,
                    "oLanguage": {
                        "sSearch": ""
                    },
                    ajax: "{{ url('/student/json') }}",
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'kota',
                            name: 'kota'
                        },
                        {
                            data: 'daerah',
                            name: 'Daerah'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });
                new $.fn.dataTable.FixedHeader(table);
            });
        </script>
    @endpush
</div>
