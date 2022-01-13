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
    / Members / Add
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                Add Member
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('member.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email</label>
                        <input type="email" id="no" name="email" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="phone">Phone</label>
                        <input type="tel" id="days" name="phone" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="no">
                            <option value="-1">Choose...</option>
                            @foreach (\App\Helper::getGender() as $key => $sex)
                                <option value="{{ $key }}">{{ $sex }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="days">Address</label>
                        <input type="text" id="days" name="address" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="days">DoB</label>
                        <input type="date" id="days" name="dob" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label for="no">Faculty</label>
                        <select class="form-control" name="faculty_id" id="no">
                            <option value="">Choose...</option>
                            @foreach (App\Models\Faculty::all() as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="semester">Semester</label>
                        <input type="number" id="semester" name="semester" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="semester">Code</label>
                        <input type="text" id="semester" name="code" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="no">Profile</label>
                        <select class="form-control" name="profile_id" id="no">
                            <option value="">Choose...</option>
                            @foreach (App\Models\Profile::all() as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 py-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="dropify" class="dropify" accept="image/*">
                    </div>

                    <div class="col-md-3 py-2">
                        <button class="btn btn-primary">Add Member</button>
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
