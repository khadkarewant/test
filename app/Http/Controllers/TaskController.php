<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();

        $count = [
            'pending' => Auth::user()->tasks()->where('status', 'pending')->count(),
            'in_progress' => Auth::user()->tasks()->where('status', 'in_progress')->count(),
            'completed' => Auth::user()->tasks()->where('status', 'completed')->count(),
        ];

        return view('tasks.index', compact('tasks', 'count'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return redirect('/tasks')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully');
    }

    public function trashed()
    {
        $tasks = Auth::user()->tasks()->onlyTrashed()->get();

        return view('tasks.trashed', compact('tasks'));
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);

        $this->authorize('restore', $task);

        $task->restore();

        return redirect('/tasks')->with('success', 'Task restored successfully');
    }
}
