@extends('layout.app')

@section('s-title')
    / Online Books
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/drophify/css/dropify.min.css') }}">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                Add Online Book
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('onlineBook.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- <div class="col-md-9"></div> --}}
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label for="desc">Description</label>
                        <input type="text" id="desc" name="desc" required class="form-control">
                    </div>
                    <div class="col-md-12 py-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="dropify" class="dropify" accept="image/*">
                    </div>
                    <div class="col-md-12 py-2">
                        <label for="image">File</label>
                        <input type="file" name="file" class="dropify" class="dropify">
                    </div>
                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Add Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Online Books</h6>
        </div>
        <div class="card-body" id="table-holder">
            <div class="">
                <div class="row font-weight-bold">
                    <div class="col-md-3">
                        Image
                    </div>
                    <div class="col-md-3">
                        File
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        Action
                    </div>
                </div>

                @foreach ($obs as $ob)
                    <hr>
                    <form action="{{ route('onlineBook.edit', ['ob' => $ob->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" name="image" class="dropify" class="dropify"
                                    accept="image/*" data-default-file="{{ asset($ob->image) }}">
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="file" class="dropify" class="dropify"
                                    data-default-file="{{ asset($ob->file) }}">
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12 mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" required class="form-control"
                                        value="{{ $ob->name }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="desc">Description</label>
                                    <input type="text" id="desc" name="desc" required class="form-control"
                                        value="{{ $ob->desc }}">
                                </div>
                            </div>


                            <div class="col-md-2 ">
                                <button class="btn btn-success btn-sm ">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('onlineBook.delete', ['ob' => $ob->id]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('vendor/drophify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
