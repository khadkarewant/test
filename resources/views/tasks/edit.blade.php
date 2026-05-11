<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
</head>
<body>
    <h1>Edit your task</h1>
    <a href="/tasks">Back to Tasks</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ old('title', $task->title) }}">
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
        <select name="status">
            <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">

        <button type="submit">Update Task</button>

    </form>
</body>
</html>