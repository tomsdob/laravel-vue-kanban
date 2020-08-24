@extends('layouts.dashboard')
@section('title') All tasks @endsection

@section('content')
    Index of todos
    @forelse($tasks as $task)
        <a href="{{ route('tasks.edit', $task->id) }}">{{ $task->title }}</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    @empty
        <span>No tasks!</span>
    @endforelse
@endsection
