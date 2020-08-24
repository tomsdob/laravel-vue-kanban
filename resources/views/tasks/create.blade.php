@extends('layouts.dashboard')
@section('title') Create a task @endsection

@section('content')
    Create of todos
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>
            <input type="text" placeholder="Title" name="title" class="form-input">
        </label>
        <label>
            <input type="text" placeholder="Description" name="description" class="form-input">
        </label>
        <label>
            <input type="text" placeholder="Badge" name="badge" class="form-input">
        </label>
        <button type="submit" class="px-4 py-3 bg-blue-500 text-white rounded-lg">Create</button>
    </form>
@endsection
