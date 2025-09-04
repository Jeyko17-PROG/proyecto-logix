<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        $tasks = auth()->user()->tasks()->orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        return view('tasks.create');
    }
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required|in:alta,media,baja'
        ]);
        Auth::user()->tasks()->create($request->all());
        return redirect()->route('tasks.index');
    }
    public function edit(Task $task) {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task) {
        $this->authorize('update', $task);
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task) {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index');
    }
};
