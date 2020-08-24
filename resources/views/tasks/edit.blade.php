@extends('layouts.dashboard')
@section('title') Edit task {{ $task->title }} @endsection

@section('content')
    Edit of todos
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @method('patch')
        @csrf
        <label>
            <input type="text" placeholder="Title" name="title" class="form-input">
        </label>
        <label>
            <input type="text" placeholder="Description" name="description" class="form-input">
        </label>
        <button type="submit" class="px-4 py-3 bg-blue-500 text-white rounded-lg">Edit</button>
    </form>
@endsection
