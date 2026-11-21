@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @auth
        <p><a href="{{ route('tasks.create') }}">+ Create Task</a></p>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to create, edit, or archive tasks.</p>
    @endauth

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
                @auth
                    <th>Action</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>{{ $task->task_date->format('F j, Y') }}</td>

                    @auth
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}">Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Archive this task?')">
                                    Archive
                                </button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="4">No active tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection