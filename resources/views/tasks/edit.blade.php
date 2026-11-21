@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $task->title) }}">
        </p>

        <p>
            <label>Status</label><br>
            <select name="status">
                <option value="pending" @selected(old('status', $task->status) === 'pending')>Pending</option>
                <option value="done" @selected(old('status', $task->status) === 'done')>Done</option>
            </select>
        </p>

        <p>
            <label>Task Date</label><br>
            <input type="date" name="task_date"
                value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}">
        </p>

        <button type="submit">Update Task</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>
@endsection