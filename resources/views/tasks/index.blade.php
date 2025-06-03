@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

    @foreach($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                @if($task->image)
                    <img src="{{ asset('public/' . $task->image) }}" alt="Image" width="100">
                @endif
                <p>Status: {{ $task->is_completed ? ' Completed' : ' Pending' }}</p>
                <p>Due: {{ $task->due_date }}</p>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
