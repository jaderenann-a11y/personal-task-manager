<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Task Title:</label>
        <br>
        <input
            type="text"
            name="title"
            value="{{ $task->title }}"
            required
        >

        <br><br>

        <label>Description:</label>
        <br>
        <textarea name="description">{{ $task->description }}</textarea>

        <br><br>

        <button type="submit">Update Task</button>
    </form>

    <br>

    <a href="{{ route('tasks.index') }}">Cancel</a>

</body>
</html>