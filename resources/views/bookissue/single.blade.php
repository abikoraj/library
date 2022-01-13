<tr id="issue-{{ $issue->id }}">
    <th>{{ $issue->id }}</th>
    <td>{{ $issue->name }}</td>
    <td>{{ $issue->from->toDateString() }}</td>
    <td>{{ $issue->to->toDateString() }}</td>
    <td>{{ $issue->address }}</td>
    <td>
        <button class="btn btn-danger" onclick="returned({{ $issue->id }})">Returned</button>
    </td>
</tr>
