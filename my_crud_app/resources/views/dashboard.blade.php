@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="text-primary">Welcome to Your Dashboard</h1>
            <p class="text-muted">Here are your current tasks:</p>
        </div>
        <div class="col text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Add New Task</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Task List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Completed</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description ?: '-' }}</td>
                            <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                            <td class="text-center">
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-info btn-sm me-1">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No tasks found. Start by adding a new task!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
