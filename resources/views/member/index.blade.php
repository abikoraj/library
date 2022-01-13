@extends('layout.app')
@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/tag/tagsinput.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('toolbar')
    <button class="btn btn-danger btn-sm" id="filter-show" onclick="refreshTable()">
        <i class="fas fa-redo"></i> Refresh
    </button>
    <a href="{{ route('member.add') }}" target="_blank"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add
        Member</a>
@endsection
@section('s-title')
    / Members
@endsection
@section('content')

    <div class="card shadow p-3">
        <table class="table mb-0" id="table">
            <thead class="card-header font-weight-bold">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <th>{{ $member->id }}</th>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->code }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->address }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('member.edit', ['member' => $member->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm"
                                href="{{ route('member.delete', ['member' => $member->id]) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            $('#table').DataTable();
        });
    </script>
@endsection
