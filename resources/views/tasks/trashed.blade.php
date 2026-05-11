<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash</title>
</head>
<body>
    <h1>Trashed List</h1>
    <a href="/tasks">Back to Tasks</a>

    @if (session('success'))
        <p> {{ session('success') }} </p>
    @endif

    <table>
        <tr>
            <th>Task ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                <form method="POST" action="/tasks/{{ $task->id }}/restore">
                    @csrf
                    <button type="submit">Restore</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>