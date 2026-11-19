@extends('layouts.app')

@section('content')
    <h1>Tasks for Today</h1>

    <p>Showing tasks for {{ now()->format('F j, Y') }}.</p>

    @if ($tasks->isEmpty())
        <p class="empty">No tasks scheduled for today.</p>
    @else
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <strong>{{ $task->title }}</strong>
                    — {{ ucfirst($task->status) }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection