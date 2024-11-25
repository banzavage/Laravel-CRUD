@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('tasks.create') }}" class="btn btn-success shadow-sm">
            <img src="{{ asset('images/add.png') }}" alt="Add Task" style="height: 24px; width: 24px;">
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Completed</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="text-center align-middle">{{ $task->title }}</td>
                            <td class="text-center align-middle">{{ $task->description }}</td>
                            <td class="text-center align-middle">
                                <span class="badge {{ $task->completed ? 'bg-success' : 'bg-danger' }}">
                                    {{ $task->completed ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('tasks.show', $task) }}" class="me-2">
                                        <img src="{{ asset('images/view.png') }}" alt="View" style="height: 18px; width: 18px;">
                                    </a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="me-2">
                                        <img src="{{ asset('images/edit.png') }}" alt="Edit" style="height: 18px; width: 18px;">
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background: none; padding: 0;" onclick="return confirm('Are you sure?')">
                                            <img src="{{ asset('images/delete.png') }}" alt="Delete" style="height: 18px; width: 18px;">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($tasks->isEmpty())
                <div class="text-center text-muted py-4">
                    No tasks found. Click the <b>+</b> button to add your first task.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
