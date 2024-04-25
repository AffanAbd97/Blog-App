@extends('layout')
@section('content')
    <x-page-header title="Post" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h3 class="card-title">Daftar Post</h3>
                                <a href="{{route('create.blog')}}" class="btn btn-primary">Buat Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Tanggal Di Buat</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($blog as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->content }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                @if ($session->username == $item->username)
                                                    <div class="d-flex" style="gap: 0.5rem;">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('edit.blog', ['blog' => $item]) }}"
                                                            role="button">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('delete.blog', ['blog' => $item]) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan=5 class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse

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
