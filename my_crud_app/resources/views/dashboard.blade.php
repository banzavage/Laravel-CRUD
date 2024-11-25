@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
        <img src="{{ asset('images/add.png') }}" alt="Add Task" style="height: 20px; width: 20px;"> 
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">
                            <img src="{{ asset('images/view.png') }}" alt="View" style="height: 20px; width: 20px;">
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                            <img src="{{ asset('images/edit.png') }}" alt="Edit" style="height: 20px; width: 20px;">
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <img src="{{ asset('images/delete.png') }}" alt="Delete" style="height: 20px; width: 20px;">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
