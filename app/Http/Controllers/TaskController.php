<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompleted;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function welcome()
    {
        $tasks = Task::where('is_archived', false)
            ->whereDate('task_date', Carbon::today())
            ->orderBy('id', 'desc')
            ->get();

        return view('welcome', compact('tasks'));
    }

    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date', 'asc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function profile()
    {
        $user = User::first();

        return view('profile', compact('user'));
    }

    public function about()
    {
        return view('about');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,done'],
            'task_date' => ['required', 'date'],
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,done'],
            'task_date' => ['required', 'date'],
        ]);

        $wasNotDone = $task->status !== 'done';

        $task->update($validated);

        if ($wasNotDone && $task->status === 'done') {
            Mail::to(env('TASK_NOTIFICATION_EMAIL', 'eidrefcyrus@gmail.com'))
                ->send(new TaskCompleted($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }
}