@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Tasks</h1>
    <form method="POST" action="{{ route('projects.tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Task</button>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline">
        </div>
        <div class="form-group">
            <label for="reminder">Reminder</label>
            <input type="datetime-local" class="form-control" id="reminder" name="reminder">
        </div>
        <button type="submit" class="btn btn-primary">Create Tasks</button>
    </form>
</div>
@endsection
