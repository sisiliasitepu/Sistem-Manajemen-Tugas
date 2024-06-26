@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></td>
                <td>{{ $project->description }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
