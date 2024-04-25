@extends('layout')

@section('content')
    <x-page-header title="Buat Blog" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('save.blog') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror "
                                        id="title" name="title" value="{{ old('title') }}" placeholder="Judul">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                </div>



                                <div class="form-group ">
                                    <label for="content">Content</label>
                                    <textarea type="text" class="form-control  @error('content') is-invalid @enderror" id="content" name="content" placeholder="content">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
@endsection
