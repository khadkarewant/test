<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>My Tasks</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    
    <a href="/tasks/create">Add Task</a>
    <a href="/tasks/trashed">BIN</a>

    <p>Pending: {{ $count['pending'] }}</p>
    <p>In Progress: {{ $count['in_progress'] }} </p>
    <p>Completed: {{ $count['completed'] }}</p>

    <table>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>

        @foreach ($tasks as $task)

        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                <a href="/tasks/{{ $task->id }}">View</a>
                <a href="/tasks/{{ $task->id }}/edit">Edit</a>

                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>