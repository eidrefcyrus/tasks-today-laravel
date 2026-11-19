@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>{{ $task->task_date->format('F j, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection