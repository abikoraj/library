@extends('layout.app')
@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/tag/tagsinput.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('toolbar')

@endsection
@section('s-title')
    / Fines
@endsection
@section('content')



    <div class="card shadow mb-4">


        <form action="{{ route('fine.add') }}" method="POST">
            @csrf
            <div class="card-body row">
                <div class="col-md-3">
                    <label for="type">Fine Type</label>
                    <select class="form-control" name="type" id="sel-type" onchange="sel(this)">
                        @foreach (\App\Helper::getFt() as $key => $Ft)
                            <option value="{{ $key }}">{{ $Ft }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="gender">Profile</label>
                    <select class="form-control" name="profile_id" id="no">
                        @foreach (\App\Models\Profile::all() as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 d-none sel sel-2">

                    <div class="d-flex justify-content-between">
                        <span>Days</span>
                        <span>Amount</span>
                        <span class="btn  btn-sm" onclick="temp()">
                            <i class="fa fa-plus-circle"></i> Add
                        </span>
                    </div>
                    <div id="table-holder">

                    </div>

                </div>
                <div class="col-md-3 d-none sel sel-1">
                    <label for="">Amount per Day</label>
                    <input type="text" class="form-control" name="amt-1">
                </div>
                <div class="col-md-3 d-none sel sel-0">
                    <label for="">Amount</label>
                    <input type="text" class="form-control" name="amt-0">
                </div>
                <div class="col-md-12 py-3">
                    <button class="btn btn-primary">Add / Update Fine</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Profile</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $fine)
                        <tr>
                            <td>
                                {{ \App\Helper::Ft[$fine->type] }}
                            </td>
                            <td>
                                {{ $fine->name }}
                            </td>
                            <td>
                                {!! $fine->amt() !!}
                            </td>
                            <td>
                                <a class="btn btn-sm text-danger" href="{{ route('fine.delete', ['fine' => $fine->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            sel(document.getElementById('sel-type'));
        });


        function refreshTable() {
            loadTable();
            document.getElementById('selector-table').reset();
        }



        var iin = 0;

        function temp() {
            $('#table-holder').append("<div id='temp_" + iin +
                "'><div class='row'><div class='col-md-4 '><input type='hidden' name='data[]' value='" + iin +
                "'><input type='number' class='form-control' required name='days_" + iin +
                "'></div><div class='col-md-4 '><input class='form-control' type='number' required name='amt_" +
                iin + "'></div><div class='col-md-4 text-right'><span class='btn text-danger ' onclick='delTemp(" +
                iin +
                ")'>del</span></div></div></div>");
            iin += 1;
        }

        function delTemp(i) {
            $('#temp_' + i).remove();
        }

        function sel(ele) {
            $('.sel').addClass('d-none');
            $('.sel-' + $(ele).val()).removeClass('d-none');
        }
    </script>
@endsection
