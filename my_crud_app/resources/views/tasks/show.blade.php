@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task Details</h1>

    <div class="mb-3">
        <strong>Title:</strong> {{ $task->title }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $task->description ?? 'No description provided' }}
    </div>

    <div class="mb-3">
        <strong>Completed:</strong> {{ $task->completed ? 'Yes' : 'No' }}
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit Task</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Task</button>
    </form>
</div>
@endsection
