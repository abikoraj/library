@extends('layout.app')
@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/tag/tagsinput.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('toolbar')
    <button class="btn btn-primary btn-sm" id="filter-show" onclick="$('#filter-holder').show();$('#filter-show').hide();">
        <i class="fas fa-list"></i> Filter
    </button>
    <button class="btn btn-danger btn-sm" id="filter-show" onclick="refreshTable()">
        <i class="fas fa-redo"></i> Refresh
    </button>
    <button onclick="temp()">

    </button>
    <a href="{{ route('book.add') }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Book</a>
@endsection
@section('s-title')
    / Books
@endsection
@section('content')

    <div class="card shadow mb-4" id="filter-holder">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
                <span>Filter</span>
                <button class="btn btn-danger" onclick="$('#filter-holder').hide();$('#filter-show').show();"><i
                        class="fas fa-times"></i></button>
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <label for="">Book Category</label>
                    <select name="cats[]" id="cats" class="form-control select2" multiple>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 pt-4">
                    <button class="btn btn-primary mt-1 w-100">Load</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <table class="table mb-0">
            <thead class="card-header font-weight-bold">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Price</th>
                    <th scope="col">Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->code }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('book.edit', ['book' => $book->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('book.delete', ['book' => $book->id]) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                            {{-- <a class="btn btn-danger btn-sm" href="{{ route('book.delete', ['book' => $book->id]) }}">
                                <i class="fas fa-trash"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
        <form action="{{ route('book.add') }}" method="POST">
            @csrf
            <div class="card-body" id="table-holder">

            </div>
            <button>sadfasdf</button>
        </form>
    </div>


@endsection
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/tag/tagsinput.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        var table;
        $(document).ready(function() {
            loadTable();
            $('.select2').select2();
            $('#filter-holder').hide();
        });


        function refreshTable() {
            loadTable();
            document.getElementById('selector-table').reset();
        }




        var iin = 0;

        function temp() {
            $('#table-holder').append("<div id='temp_" + iin + "'><input type='hidden' name='data[]' value='" + iin +
                "'><input name='days_" + iin + "'><input name='amt_" + iin + "'><span onclick='delTemp(" + iin +
                ")'>del</span></div>");
            iin += 1;
        }

        function delTemp(i) {
            $('#temp_' + i).remove();
        }

        function loadTableFromSelector() {

            axios.post("{{ route('book.load') }}", {
                    cats: $('#cats').val()
                })
                .then((res) => {
                    $('#table-holder').html(res.data);
                    table = $('#dataTable').DataTable({
                        "columnDefs": [{
                            "sortable": false,
                            "searchable": false,
                            "targets": 4
                        }]
                    });
                })
                .catch((err) => {

                });
        }

        function loadTable() {
            axios.get("{{ route('book.load') }}")
                .then((res) => {
                    $('#table-holder').html(res.data);
                    table = $('#dataTable').DataTable({
                        "columnDefs": [{
                            "sortable": false,
                            "searchable": false,
                            "targets": 4
                        }]
                    });
                })
                .catch((err) => {

                });
        }
    </script>
@endsection
