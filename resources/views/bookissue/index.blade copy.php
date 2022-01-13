@extends('layout.app')

@section('s-title')
    / Book Issues
@endsection
@section('css')
    <style>
        .inform input {
            margin-bottom: 8px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('vendor/drophify/css/dropify.min.css') }}">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                Issue Book
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('bookIssue.add') }}" method="post" enctype="multipart/form-data" class="inform">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Member ID</label>
                        <input type="text" id="member_id" required class="form-control" onkeydown="searchData(this,event)">
                    </div>
                    <div class="col-md-3">
                        <span class="btn btn-success">
                            Search
                        </span>
                    </div>
                    <div id="display">

                    </div>
                </div>
                <div class="d-none" id="alldata">
                    <div class="row">

                        {{-- <div class="col-md-2">
                            <label for="no">Book</label>
                            <select class="form-control" name="book_id" id="no">
                                <option value="">Choose...</option>
                                @foreach (App\Models\Book::all() as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-md-3">
                            <label for="name">From</label>
                            <input type="date" id="name" name="from" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">From</label>
                            <input type="date" id="name" name="from" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="desc">To</label>
                            <input type="date" id="desc" name="to" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="desc">Returned</label>
                            <input type="date" id="desc" name="returned" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <label for="status">Status</label>
                            <input type="number" id="desc" name="status" required class="form-control">
                        </div>
                        <div class="col-md-3 py-2">
                            <button class="btn btn-primary">Add Book</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="card shadow mb-4">
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

                @foreach ($issues as $issue)
                    <hr>
                    <form action="{{ route('bookIssue.edit', ['issue' => $issue->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <select class="form-control" name="book_id" id="no">
                                    <option value="">Choose...</option>
                                    @foreach (App\Models\Book::all() as $book)
                                        <option value="{{ $book->id }}"
                                            {{ $book->id == $issue->book_id ? 'selected' : '' }}>
                                            {{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" id="desc" name="from" required class="form-control"
                                    value="{{ $issue->from }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" id="desc" name="to" required class="form-control"
                                    value="{{ $issue->to }}">
                            </div>
                            <div class="col-md-2 pl-0 pr-0">
                                <input type="date" id="desc" name="returned" class="form-control"
                                    value="{{ $issue->returned }}">
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="desc" name="status" required class="form-control"
                                    value="{{ $issue->status }}">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success btn-sm ">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('bookIssue.delete', ['issue' => $issue->id]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div> --}}


@endsection
@section('script')
    <script src="{{ asset('vendor/drophify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();


        function searchData(ele, e) {
            if (e.which == 13) {
                axios.post('')
            }
        }
    </script>

@endsection
