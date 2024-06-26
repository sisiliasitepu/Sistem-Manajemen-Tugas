@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
