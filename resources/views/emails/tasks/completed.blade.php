<h1>Task Completed</h1>

<p>The following task has been marked as done:</p>

<ul>
    <li><strong>Title:</strong> {{ $task->title }}</li>
    <li><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
    <li><strong>Task date:</strong> {{ $task->task_date->format('F j, Y') }}</li>
</ul>