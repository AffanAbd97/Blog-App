@extends('layout')
@section('content')
    <x-page-header title="Departement" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h3 class="card-title">Daftar Departement</h3>
                                <a href="" class="btn btn-primary">Buat Departement</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Induk Sub. Dep</th>
                                        <th>Label Dep</th>
                                        <th>Keuntungam</th>
                                        <th>Tgl Promosi Awal</th>
                                        <th>Tgl Promosi Akhir</th>
                                        <th>Diskon</th>
                                        <th>Banyak Item</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        <tr>
                                            <td colspan=10 class="text-center">Data Kosong</td>
                                        </tr>
                                  

                                </tbody>

                              
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('addon-script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endpush
