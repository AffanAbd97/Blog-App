@extends('layout')

@section('content')
    <x-page-header title="Daftar Blog" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @forelse ($blogs as $item)
                                <div class="card" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$item->username}}</h6>
                                        <p class="card-text">{{$item->content}}</p>
                                        <p  class="card-subtitle">{{convert_date($item->date)}}</p>

                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
@endsection
