@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Projects</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $projectsCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $tasksCount }}</h5>
                </div>
            </div>
        </div>
    </div>

    <h2>Recent Tasks</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Project</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentTasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->created_at->format('Y-m-d') }}</td>
                    <td>{{ $task->completed ? 'Completed' : 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
