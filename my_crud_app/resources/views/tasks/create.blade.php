@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Task</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="completed" id="completed" class="form-check-input" value="1">
            <label for="completed" class="form-check-label">Mark as Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection