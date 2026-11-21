@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <p>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </p>

        <p>
            <label>Status</label><br>
            <select name="status">
                <option value="pending" @selected(old('status') === 'pending')>Pending</option>
                <option value="done" @selected(old('status') === 'done')>Done</option>
            </select>
        </p>

        <p>
            <label>Task Date</label><br>
            <input type="date" name="task_date" value="{{ old('task_date') }}">
        </p>

        <button type="submit">Save Task</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>
@endsection