<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        h1 {
            margin: 0;
            color: #333;
        }

        .add-btn {
            background: #667eea;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #5568d9;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .task {
            background: white;
            padding: 25px;
            margin-bottom: 18px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .task h2 {
            margin-top: 0;
            color: #333;
        }

        .task p {
            color: #666;
        }

        .status {
            font-weight: bold;
        }

        .pending {
            color: #f59e0b !important;
        }

        .completed {
            color: #10b981 !important;
        }

        .due-date {
            font-weight: bold;
            color: #7c3aed !important;
        }

        button,
        .edit-btn {
            border: none;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-right: 6px;
        }

        .complete-btn {
            background: #10b981;
            color: white;
        }

        .complete-btn:hover {
            background: #059669;
        }

        .edit-btn {
            background: #3b82f6;
            color: white;
        }

        .edit-btn:hover {
            background: #2563eb;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
        }

        .delete-btn:hover {
            background: #dc2626;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Personal Task Manager</h1>

        <a href="{{ route('tasks.create') }}" class="add-btn">
            + Add Task
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($tasks as $task)

        <div class="task">

            <h2>{{ $task->task_name }}</h2>

            <p>{{ $task->description }}</p>

            @if($task->status === 'Completed')
                <p class="status completed">
                    Status: Completed
                </p>
            @else
                <p class="status pending">
                    Status: Pending
                </p>
            @endif

            @if($task->due_date)
                <p class="due-date">
                    Due Date: {{ $task->due_date->format('F d, Y') }}
                </p>
            @else
                <p class="due-date">
                    Due Date: No due date
                </p>
            @endif

            @if($task->status !== 'Completed')
                <form action="{{ route('tasks.complete', $task) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="complete-btn">
                        Complete
                    </button>
                </form>
            @endif

            <a href="{{ route('tasks.edit', $task) }}" class="edit-btn">
                Edit
            </a>

            <form action="{{ route('tasks.destroy', $task) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="delete-btn"
                        onclick="return confirm('Are you sure you want to delete this task?')">
                    Delete
                </button>
            </form>

        </div>

    @empty

        <div class="empty">
            <p>No tasks yet. Add your first task!</p>
        </div>

    @endforelse

</div>

</body>
</html>