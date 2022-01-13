@extends('layout.app')

@section('s-title')
    / Setting / Racks
@endsection
@section('content')
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            Add Profile
        </h4>
    </div> --}}
        <div class="card-body">
            <form action="{{ route('rack.add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label for="desc">Description</label>
                        <input type="text" id="desc" name="desc" required class="form-control">
                    </div>

                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Add Rack</button>
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
                        Name
                    </div>
                    <div class="col-md-7">
                        Description
                    </div>

                    <div class="col-md-2"></div>
                </div>

                @foreach ($racks as $rack)
                    <hr>
                    <form action="{{ route('rack.edit', ['rack' => $rack->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">

                                <input type="text" id="name" name="name" required class="form-control"
                                    value="{{ $rack->name }}">
                            </div>
                            <div class="col-md-7">

                                <input type="text" id="desc" name="desc" required class="form-control"
                                    value="{{ $rack->desc }}">
                            </div>

                            <div class="col-md-2 py-2">
                                <button class="btn btn-success btn-sm " >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('rack.delete', ['rack' => $rack->id]) }}">
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

@endsection
@section('script')

@endsection
