# Personal Task Manager

A simple Personal Task Manager built using Laravel. The system allows users to add, view, edit, delete, and update the status of tasks.

## Project Information

**Project Code:** WST21-PM-2026-SF  
**Student Name:** Renan Jade I Bahag  
**Course & Section:** BSIT-2 SECTION 7  
**Database:** SQLite

## Technologies Used

- Laravel
- PHP
- SQLite
- Blade
- HTML
- CSS

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Task Status
- Set Due Date
- Add Task Description

## How the System Works

### 1. View Tasks

The user can view all existing tasks on the Task Manager page. Each task displays its information and current status.

### 2. Add Task

The user clicks the **Add Task** button and enters the task information such as task name, description, and due date. After submitting the form, the task is saved to the SQLite database.

### 3. Edit Task

The user can click the **Edit** button to modify the information of an existing task. After saving the changes, the updated information is displayed in the task list.

### 4. Update Status

The user can mark a task as **Completed**. The system updates the task status from Pending to Completed.

### 5. Delete Task

The user can delete an existing task. The task is removed from the database and no longer appears in the task list.

## System Flow

The system follows this process:

**Routes → Controller → Model → Database → Blade View**

1. The user interacts with the Blade interface.
2. The request is received by the Laravel Route.
3. The Route sends the request to the Task Controller.
4. The Controller processes the request.
5. The Task Model communicates with the SQLite database.
6. The result is returned to the Blade View.
7. The updated output is displayed to the user.

## System UI Screenshots

### Task List

![Task List](https://github.com/user-attachments/assets/1b981f25-7181-4a90-8bb0-82ac0a9ff6c0)


### Add Task

![Add Task](https://github.com/user-attachments/assets/a527f58b-f5ac-496a-ac5c-b792585769b2)

### Edit Task

![Edit Task](https://github.com/user-attachments/assets/f2c0ee83-30b2-46fe-b9fc-81e938c1dd95)

### Completed Task

![Completed Task](https://github.com/user-attachments/assets/11f5c78c-2612-40d2-a691-6676c6e7845b)

### Delete Task

![Delete Task](https://github.com/user-attachments/assets/c0a81f76-1204-4534-aa64-e2fd1e372e55)
## Output

The completed system successfully allows the user to manage tasks through the Laravel application.

The system can:
- Create new tasks
- Display saved tasks
- Edit task information
- Change task status
- Delete tasks
- Store task information using SQLite
