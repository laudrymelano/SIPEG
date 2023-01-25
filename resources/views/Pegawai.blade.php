@extends('layouts.master')
@push('custom-css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Sweet Alert -->
@endpush

@push('custom-js')
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
@endpush
@section('content')
    {{-- @include('flash-message') --}}
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jml }}</h3>
                    <p>Jumlah Pegawai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold mr-2 mt-2">Informasi Pegawai</h3>
                        <a href="#" class="btn btn-info btn-sm add" style="float: right">
                            <i class="fas fa-user-plus"> Tambah Pegawai</i>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-sm table-bordered text-nowrap" id="datatableExport">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Kontrak</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

        <!-- Start Modal -->
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="addPegawai" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            {{-- <form> --}}
                            <div id="nama-group" class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ old('nama') }}" class="form-control" id="nama"
                                    name="nama" placeholder="Nama Pegawai">
                                @error('nama')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" value="{{ old('password') }}" class="form-control" id="password"
                                    name="password" placeholder="Password">
                                @error('password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{ old('alamat') }}" class="form-control" id="alamat"
                                    name="alamat" placeholder="Alamat">
                                @error('alamat')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="No_Telp">No. Telepon</label>
                                <input type="text" value="{{ old('no_telp') }}" class="form-control" id="no_telp"
                                    name="no_telp" placeholder="No. Telepon">
                                @error('no_telp')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <br>
                                <select class="form-select" name="id_jabatan" id="id_jabatan"
                                    aria-label="Default select example">
                                    <option selected>-- Pilih Posisi --</option>
                                    <option value="1">Karyawan</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Direktur</option>
                                </select>
                                @error('id_jabatan')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Kontrak">Kontrak</label>
                                <input type="text" value="{{ old('durasi') }}" class="form-control" id="durasi"
                                    name="durasi" placeholder="Kontrak Kerja">
                                @error('durasi')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Gaji">Gaji</label>
                                <input type="text" value="{{ old('gaji') }}" class="form-control" id="gaji"
                                    name="gaji" placeholder="Gaji">
                                @error('gaji')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal -->

        <!-- Start Modal -->
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="editPegawai" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            {{-- <form> --}}
                            <div id="nama-group" class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ old('nama') }}" class="form-control" id="nama-edit"
                                    name="nama" placeholder="Nama Pegawai">
                                @error('nama')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" value="{{ old('password') }}" class="form-control"
                                    id="password-edit" name="password" placeholder="Password">
                                @error('password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{ old('alamat') }}" class="form-control" id="alamat-edit"
                                    name="alamat" placeholder="Alamat">
                                @error('alamat')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="No_Telp">No. Telepon</label>
                                <input type="text" value="{{ old('no_telp') }}" class="form-control"
                                    id="no_telp-edit" name="no_telp" placeholder="No. Telepon">
                                @error('no_telp')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <br>
                                <select class="form-select" name="id_jabatan" id="id_jabatan-edit"
                                    aria-label="Default select example">
                                    <option selected>-- Pilih Posisi --</option>
                                    <option value="1">Karyawan</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Direktur</option>
                                </select>
                                @error('id_jabatan')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Kontrak">Kontrak</label>
                                <input type="text" value="{{ old('durasi') }}" class="form-control" id="durasi-edit"
                                    name="durasi" placeholder="Kontrak Kerja">
                                @error('durasi')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Gaji">Gaji</label>
                                <input type="text" value="{{ old('gaji') }}" class="form-control" id="gaji-edit"
                                    name="gaji" placeholder="Gaji">
                                @error('gaji')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    @endsection

    @section('scripts')
        <script>
            $(document).on('click', '.edit-btn', function(event) {
                var id = $(event.currentTarget).attr('data-id');
                var selected_option = $(this).val();
                // console.log(id);
                // var table = $("#datatableExport").DataTable();

                $tr = $(this).closest('tr');
                // if ($($tr).hasClass('child')) {
                //     $tr = $tr.prev('.parent');
                // }

                // var data = table.row($tr).data()

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                // console.log(data);
                $('#nama-edit').val(data[0]);
                $('#alamat-edit').val(data[1]);
                $('#no_telp-edit').val(data[2]);
                $('#id_jabatan-edit').val(data[3]);
                $('select[name="id_jabatan"]').removeAttr("disabled").html('');
                $('select[name="id_jabatan"]').append('<option value="">--Pilih Posisi--</option>');
                $('select[name="id_jabatan"]').append('<option value="' + id + '">' + data[3] + '</option>');
                // $('select[name="id_jabatan"]').append(
                //     '<option value="' + id + '">' +
                //     val.data[3] + '</option>');
                $('#durasi-edit').val(data[4]);
                $('#gaji-edit').val(data[5]);
                // $('#editPegawai').attr('action', 'api/edit/pegawai/' + id);
                $('#editModal').modal('show');

                $('#editPegawai').submit(function(event) {
                    var formData = {
                        nama: $('#nama-edit').val(),
                        alamat: $('#alamat-edit').val(),
                        no_telp: $('#no_telp-edit').val(),
                        id_jabatan: $('#id_jabatan-edit').val(),
                        durasi: $('#durasi-edit').val(),
                        gaji: $('#gaji-edit').val(),
                    };

                    $.ajax({
                        type: "PUT",
                        url: "{{ url('api/edit/pegawai') }}" + "/" + id,
                        data: formData,
                        DataType: "json",
                        encode: true,
                        success: function(response) {
                            window.location = "{{ url('/dashboard') }}";
                        },
                    });
                    $("#datatableExport").DataTable().ajax.reload(null, false);
                    event.preventDefault();
                });

            });
        </script>
        <script>
            $('.add').click(function() {
                $('#addModal').modal('show');

                $tr = $(this).closest('tr');

                $('#addPegawai').submit(function(event) {
                    var formData = {
                        nama: $('#nama').val(),
                        password: $('#password').val(),
                        alamat: $('#alamat').val(),
                        no_telp: $('#no_telp').val(),
                        id_jabatan: $('#id_jabatan').val(),
                        durasi: $('#durasi').val(),
                        gaji: $('#gaji').val(),
                    };

                    $.ajax({
                        type: "POST",
                        url: "{{ url('api/add/pegawai') }}",
                        data: formData,
                        DataType: "json",
                        encode: true,
                        success: function(response) {
                            window.location = "{{ url('/dashboard') }}";
                        },
                    });
                    $("#datatableExport").DataTable().ajax.reload(null, false);
                    event.preventDefault();
                });
            });
        </script>
        <script>
            $(document).ready(() => {

                $("#datatableExport").DataTable({
                    responsive: true,
                    destroy: true,
                    dom: 'lBfrtip',
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
                    processing: true,
                    deferRender: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url('api/pegawai') }}",
                        type: "POST",
                        data: function(d) {
                            d._token = '{{ csrf_token() }}';
                        }
                    },
                    columns: [{
                            data: "nama",
                            name: "nama"
                        },
                        {
                            data: "alamat",
                            name: "alamat"
                        },
                        {
                            data: "no_telp",
                            name: "no_telp"
                        },
                        {
                            data: "posisi",
                            name: "posisi"
                        },
                        {
                            data: "durasi",
                            name: "durasi"
                        },
                        {
                            data: "gaji",
                            name: "gaji"
                        },
                        {
                            data: function(row) {
                                return '<a title="Edit" class="btn action-btn btn-primary btn-sm edit-btn" data-id="' +
                                    row.id + '">' + '<i class="fas fa-user-edit"></i></a>' + '&nbsp;' +
                                    '<a title="Delete" class="btn action-btn btn-danger btn-sm delete-btn" data-id="' +
                                    row.id + '">' + '<i class="fas fa-trash-alt"></i></a>'
                            },
                            name: 'id'
                        }
                    ],
                });
            });



            $(document).on('click', '.delete-btn', function(event) {
                var id = $(event.currentTarget).attr('data-id');
                swal({
                    title: "Anda Yakin?",
                    text: 'Apakah anda yakin akan menghapus pegawai ini?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ url('api/delete/pegawai') }}" + "/" + id,
                            type: "DELETE",
                            DataType: "json",
                            data: function(d) {
                                d._token = '{{ csrf_token() }}';
                            },
                            success: function(response) {
                                $("#datatableExport").DataTable().ajax.reload(null, false);
                            },
                        });
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Pegawai tidak jadi dihapus");
                    }
                });
            });
        </script>
    @endsection

    @section('scripts')
    @endsection
