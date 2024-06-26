<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = Project::count();
        $tasksCount = Task::count();
        $recentTasks = Task::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact('projectsCount', 'tasksCount', 'recentTasks'));
    }
}
