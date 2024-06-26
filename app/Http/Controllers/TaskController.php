<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $project->tasks()->create($request->all());
        return redirect()->route('projects.show', $project);
    }

    public function show(Project $project, Task $task)
    {
        // Tambahkan logika untuk menampilkan detail tugas
        return view('tasks.show', compact('project', 'task'));
    }

    public function index(Project $project)
    {
        return view('tasks.index', compact('project'));
    }


    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'completed' => 'required|boolean',
        ]);

        $task->update($request->all());
        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.show', $project)->with('success', 'Task deleted successfully.');
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }
}
