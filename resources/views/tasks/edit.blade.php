<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            padding: 40px;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #667eea;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5568d9;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #667eea;
            text-decoration: none;
        }

        .error {
            background: #ffe0e0;
            color: #b00020;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>✏️ Edit Task</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_name">Task Name</label>
        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >

        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
        >{{ old('description', $task->description) }}</textarea>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="Pending"
                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>

        <label for="due_date">Due Date</label>
        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
        >

        <button type="submit">Update Task</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="back">
        ← Back to Tasks
    </a>

</div>

</body>
</html>