<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-3">
        <strong>Task:</strong> {{ $task->title }}
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
