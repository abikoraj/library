@extends('layout.app')

@section('s-title')
    / Setting / Faculties
@endsection
@section('content')
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            Add Profile
        </h4>
    </div> --}}
        <div class="card-body">
            <form action="{{ route('faculty.add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="sem">Semisters</label>
                        <input type="number" id="sem" name="sem" required class="form-control">
                    </div>

                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Add Faculty</button>
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
                    <div class="col-md-8">
                        Name
                    </div>
                    <div class="col-md-2">
                        Semesters
                    </div>

                    <div class="col-md-2"></div>
                </div>

                @foreach ($faculties as $faculty)
                    <hr>
                    <form action="{{ route('faculty.edit', ['faculty' => $faculty->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">

                                <input type="text" id="name" name="name" required class="form-control"
                                    value="{{ $faculty->name }}">
                            </div>
                            <div class="col-md-2">

                                <input type="number" id="sem" name="sem" required class="form-control"
                                    value="{{ $faculty->sem }}">
                            </div>

                            <div class="col-md-2 py-2">
                                <button class="btn btn-success btn-sm ">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('faculty.delete', ['faculty' => $faculty->id]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                @endforeach
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password For <span id="passname"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="password">
                    <input type="hidden" id="user_id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="changePassword()">Update Passord</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
