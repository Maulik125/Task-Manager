@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <input type="text" name="title" value="{{ $task->title }}" class="form-control mb-2" required>
        <textarea name="description" class="form-control mb-2">{{ $task->description }}</textarea>
        
        @if($task->image)
            <img src="{{ asset('storage/' . $task->image) }}" width="100">
        @endif

        <input type="file" name="image" class="form-control mb-2">
        <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}> Completed
        <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control mb-2">

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
