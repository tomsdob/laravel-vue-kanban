<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Return an index view
    public function index()
    {
        $tasks = auth()->user()->tasks->sortBy('completed');
        return view('tasks.index', compact('tasks'));
    }

    public function fetch()
    {
        return auth()->user()->tasks;
    }

    // Return a view with a create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store the new task in the DB
    public function store(Request $request)
    {
        auth()->user()->tasks()->create($request->all());
        return redirect(route('tasks.index'));
    }

    // Return a specific task
    public function show($id)
    {
        //
    }

    // Return a view with an edit form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update a task in the DB
    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'badge' => $request->badge,
            'category' => $request->category,
        ]);
    }

    // Delete a task from the DB
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect(route('tasks.index'));
    }
}
