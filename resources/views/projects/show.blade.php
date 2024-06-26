@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
    <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Project</button>
    </form>

    <h2>Add Task</h2>
    <form method="POST" action="{{ route('projects.tasks.store', $project) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <h2>Tasks</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->tasks as $task)
                <tr>
                    <td><a href="{{ route('projects.tasks.show', ['project' => $project, 'task' => $task]) }}">{{ $task->name }}</a></td>
                    <td>{{ $task->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Completed</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->tasks as $task)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <form method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}">
                        @method('PATCH')
                        <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('projects.tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Task</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
