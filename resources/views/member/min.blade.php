<div class="card shadow my-3">
    <div class="card-body">

        <div class="row ">
            <div class="col-md-3 ">
                <img src="{{ asset($member->image) }}" alt="" class="w-100">
            </div>

            <div class="col-md-9 row">
                <div class="col-md-4">
                    <strong>
                        Name
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->name }}
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>
                        Faculty
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->faculty->name }}
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>
                        Semester
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->semester }}
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>
                        Address
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->address }}
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>
                        Email
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->email }}
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>
                        Phone
                    </strong>
                    {{-- <br> --}}
                    <p>
                        {{ $member->phone }}
                    </p>
                </div>

            </div>
            <input type="hidden" id="mid" value="{{ $member->id }}">
        </div>
        <hr>
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="name">Book Code</label>
                    <input list="books-data" type="text" id="code" required class="form-control"
                        onkeydown="searchBook(this,event)">
                </div>
                <div class="col-md-3">
                    <input type="checkbox" id="clear-after"> Clear After Select
                </div>
            </div>
            <div id="display-book">
            </div>
        </div>
        @include('member.issue')

    </div>
</div>
