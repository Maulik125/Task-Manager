<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mines:jpg,jpeg,png|max:2048'
        ]);

        $task = new Task($request->except('image'));

        if ($request->hasFile('image')) {
                $path = $request->file('image')->store('task_images', 'public');
                $task->image = $path;
        }

        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task is Created');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tasks.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mines:jpg,jpeg,png|max:2048'
        ]);

        $task = new Task($request->except('image'));

        if ($request->hasFile('image')) {
                $path = $request->file('image')->store('task_images', 'public');
                $task->image = $path;
        }

        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task is Created');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = $task->id;
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task is deleted');
    }
}
