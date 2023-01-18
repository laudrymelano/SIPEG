<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIPEG PT.X')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @stack('custom-css')
    <!-- Theme style -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    {{-- trix --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('assets/dist/js/trix.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

        @include('layouts.nav-header')
        @include('layouts.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
                @include('flash-message')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote.js') }}"></script>

    <script>
        $(function() {
            $('#datatable-export').DataTable({
                responsive: true,
                dom: 'lBfrtip',
                order: [
                    [0, "desc"]
                ],
                lengthChange: true,
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "Semua"]
                ],
                autoWidth: true,
                buttons: [
                    "excel",
                    {
                        extend: "pdf",
                        exportOptions: {
                            columns: ':visible'
                        },
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    },
                    {
                        extend: "print",
                        exportOptions: {
                            columns: ':visible'
                        },
                        customize: function(win) {
                            let last = null;
                            let current = null;
                            let bod = [];
                            let css = '@page { size: Legal landscape; }',
                                head = win.document.head || win.document.getElementsByTagName(
                                    'head')[0],
                                style = win.document.createElement('style');

                            style.type = 'text/css';
                            style.media = 'print';

                            if (style.styleSheet) {
                                style.styleSheet.cssText = css;
                            } else {
                                style.appendChild(win.document.createTextNode(css));
                            }
                            head.appendChild(style);
                        }
                    },
                    'colvis'
                ],
            });
        });
    </script>

    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                // dom: 'lBfrtip',
                order: [
                    [0, "desc"]
                ],
                lengthChange: true,
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "Semua"]
                ],
                autoWidth: true,
                // buttons: [
                //     "excel", 
                //     {
                //         extend: "pdf",
                //         exportOptions: {
                //             columns: ':visible'
                //         },
                //         orientation: 'landscape',
                //         pageSize: 'LEGAL'
                //     }, 
                //     {
                //         extend: "print",
                //         exportOptions: {
                //             columns: ':visible'
                //         },
                //         customize: function(win) {
                //             let last = null;
                //             let current = null;
                //             let bod = [];
                //             let css = '@page { size: Legal landscape; }',
                //                 head = win.document.head || win.document.getElementsByTagName('head')[0],
                //                 style = win.document.createElement('style');

                //             style.type = 'text/css';
                //             style.media = 'print';

                //             if (style.styleSheet) {
                //                 style.styleSheet.cssText = css;
                //             } else {
                //                 style.appendChild(win.document.createTextNode(css));
                //             }
                //             head.appendChild(style);
                //         }
                //     }, 
                //     'colvis'
                // ],
            });
        });
    </script>
    @yield('scripts')

</body>

</html>
