@extends('layout.app')
@section('css')
    <style>
        input {
            margin-bottom: 8px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('vendor/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    / Books / Edit
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                Edit Book
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('book.edit', ['book' => $item->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control" value="{{ $item->name }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">ISBN</label>
                        <input type="text" id="no" name="isbn" required class="form-control" value="{{ $item->isbn }}">
                    </div>
                    <div class="col-md-3">
                        <label for="days">Author</label>
                        <input type="text" id="days" name="author" required class="form-control"
                            value="{{ $item->author }}">
                    </div>

                    <div class="col-md-3">
                        <label for="days">Quantity</label>
                        <input type="number" id="days" name="qty" class="form-control" value="{{ $item->qty }}">
                    </div>
                    <div class="col-md-3">
                        <label for="days">Price</label>
                        <input type="number" id="days" name="price" class="form-control" value="{{ $item->price }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Code</label>
                        <input type="text" id="no" name="code" class="form-control" value="{{ $item->code }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Edition</label>
                        <input type="text" id="no" name="edition" class="form-control" value="{{ $item->edition }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Publisher</label>
                        <input type="text" id="no" name="publisher" class="form-control" value="{{ $item->publisher }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Published</label>
                        <input type="text" id="no" name="published" class="form-control"
                            value="{{ $item->published }}">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Book Category</label>
                        <select class="form-control" name="book_category_id" id="no">
                            <option value="">Choose...</option>
                            @foreach (App\Models\BookCateory::all() as $bk)
                                <option value="{{ $bk->id }}"
                                    {{ $bk->id == $item->book_category_id ? 'selected' : '' }}>
                                    {{ $bk->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="no">Rack</label>
                        <select class="form-control" name="rack_id" id="no">
                            <option value="">Choose...</option>
                            @foreach (App\Models\Rack::all() as $rack)
                                <option value="{{ $rack->id }}" {{ $rack->id == $item->rack_id ? 'selected' : '' }}>
                                    {{ $rack->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 py-2">
                        <label for="image">image</label>
                        <input type="file" name="image" class="dropify" class="dropify" accept="image/*"
                            data-default-file="{{ asset($item->image) }}">
                    </div>
                    <div class="col-md-12">
                        <label for="no">Note</label>
                        <textarea type="text" id="no" name="note" class="form-control">{{ $item->note }}</textarea>
                    </div>
                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Update Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('vendor/drophify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
