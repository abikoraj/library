<div class="card shadow my-3">
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <strong>Name</strong>
                <p>{{ $book->name }}</p>
            </div>
            <div class="col-md-3">
                <strong>Author</strong>
                <p>{{ $book->author }}</p>
            </div>
            <div class="col-md-3">
                <strong>Publication</strong>
                <p>{{ $book->publisher }}</p>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success" id="issue-book" onclick="issue({{ $book->id }})">Issue</button>
            </div>
        </div>
    </div>
</div>
