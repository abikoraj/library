@extends('layout.app')

@section('s-title')
    / Setting / Book Categories
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/drophify/css/dropify.min.css') }}">
@endsection
@section('content')
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            Add Profile
        </h4>
    </div> --}}
        <div class="card-body">
            <form action="{{ route('bookcategory.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 py-2">
                        <label for="image">image</label>
                        <input type="file" name="image" class="dropify" class="dropify" accept="image/*">
                    </div>
                    {{-- <div class="col-md-9"></div> --}}
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label for="desc">Description</label>
                        <input type="text" id="desc" name="desc" required class="form-control">
                    </div>


                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
        <div class="card-body" id="table-holder">
            <div class="">
                <div class="row font-weight-bold">
                    <div class="col-md-3">
                        image
                    </div>
                    <div class="col-md-2">
                        Name
                    </div>
                    <div class="col-md-5">
                        Description
                    </div>

                    <div class="col-md-2"></div>
                </div>

                @foreach ($cats as $cat)
                    <hr>
                    <form action="{{ route('bookcategory.edit', ['cat' => $cat->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" name="image" class="dropify" class="dropify"
                                    accept="image/*" data-default-file="{{ asset($cat->image) }}">
                            </div>
                            {{-- <div class="col-md-9"></div> --}}
                            <div class="col-md-2">
                                <input type="text" id="name" name="name" required class="form-control"
                                    value="{{ $cat->name }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="desc" name="desc" required class="form-control"
                                    value="{{ $cat->desc }}">
                            </div>


                            <div class="col-md-2 ">
                                <button class="btn btn-success btn-sm ">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('bookcategory.delete', ['cat' => $cat->id]) }}">
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
