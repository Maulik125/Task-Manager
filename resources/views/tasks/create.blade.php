@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Title" class="form-control mb-2" required>
        <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
        <input type="file" name="image" class="form-control mb-2">
        <input type="checkbox" name="is_completed"> Completed
        <input type="date" name="due_date" class="form-control mb-2">

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
