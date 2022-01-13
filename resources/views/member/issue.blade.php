<hr>
<div class="">
    <table class="table mb-0" id="table">
        <thead class="card-header font-weight-bold">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Issued Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Fine</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="book_issued">
            @foreach ($member->IssuedBooks() as $issue)
                {{-- <tr>
                    <th>{{ $issue->id }}</th>
                    <td>{{ $issue->name }}</td>
                    <td>{{ $issue->from }}</td>
                    <td>{{ $issue->to }}</td>
                    <td>{{ $issue->address }}</td>
                    <td>

                    </td>
                </tr> --}}
                @include('bookissue.single',['issue'=>$issue])
            @endforeach
        </tbody>
    </table>
</div>
