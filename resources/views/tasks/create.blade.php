<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task</title>
</head>
<body>
    <a href="/tasks">Back to Tasks</a>
    @if($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif
    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <textarea name="description" placeholder="Description"></textarea>
        <select name="status">
            <option value="" disabled selected hidden>SELECT ONE</option>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        <input type="date" name="due_date">

        <button type="submit">Create</button>
    </form>
</body>
</html>