<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Detail</title>
</head>
<body>
    <h1>Task Details</h1>
    <a href="/tasks">Back to Task</a>
    <a href="/tasks/{{ $task->id}}/edit">Edit Task</a>

    <div>
        <strong>Title: </strong>{{ $task->title }}
        <strong>Description: </strong> {{ $task->description }}
        <strong>Status: </strong> {{ $task->status }}
        <strong>Due Date: </strong> {{ $task->due_date }}
    </div>

</body>
</html>