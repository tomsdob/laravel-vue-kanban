@extends('layouts.dashboard')
@section('title') All tasks @endsection

@section('content')
    {{-- Top menu --}}
    <div class="flex justify-end">
        <button onclick="document.getElementById('taskCreateModal').classList.toggle('hidden');"
                class="px-3 py-2 flex justify-center items-center text-base font-medium text-white text-center rounded-lg bg-primary hover:bg-primary_dark transition duration-300 transform hover:-translate-y-1 hover:shadow-md ease focus:outline-none focus:shadow-outline"
        >
            <span>Add</span>
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="plus w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        </button>
    </div>
    {{-- Create task modal --}}
    <div id="taskCreateModal" class="p-4 md:p-0 hidden fixed inset-0 flex justify-center items-center w-full h-full z-10">
        <div class="relative p-4 rounded-lg bg-white z-20 w-full max-w-screen-sm">
            <h3 class="mb-6 text-xl font-medium text-gray-800 leading-5">Create a task</h3>
            <form method="POST" action="{{ route('tasks.store') }}" class="flex flex-col space-y-4">
                @csrf
                <label>
                    <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Title</span>
                    <input class="form-input w-full"
                           placeholder="Task title..."
                           name="title"
                           type="text"
                           required
                    >
                </label>
                <label>
                    <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Description</span>
                    <textarea class="form-input w-full" id="ckeditor" placeholder="Task description..." name="description"></textarea>
                </label>
                <div class="grid md:grid-cols-2 md:gap-x-4 gap-y-4 md:gap-y-0">
                    <label>
                        <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Due date</span>
                        <input class="px-3 py-2 text-base font-normal text-gray-800 w-full border rounded-lg focus:outline-none focus:shadow-outline"
                               placeholder="Due date..."
                               name="due_date"
                               type="date"
                        >
                    </label>
                    <label>
                        <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Badge/project</span>
                        <select class="form-select w-full"
                                name="badge"
                        >
                            <option value="0">Project...</option>
                            <option>Zaimo</option>
                            <option>Zaimiplus</option>
                            <option>Zaimi365</option>
                            <option>Vayonlineapp</option>
                        </select>
                    </label>
                </div>
                <button type="submit"
                        class="px-3 py-2 flex justify-center items-center text-base font-medium text-white text-center rounded-lg bg-primary hover:bg-primary_dark transition duration-300 transform hover:-translate-y-1 hover:shadow-md ease focus:outline-none focus:shadow-outline"
                >
                    Create
                </button>
            </form>
        </div>
        <div class="absolute inset-0 w-full h-full bg-black bg-opacity-25 z-10" onclick="document.getElementById('taskCreateModal').classList.toggle('hidden');"></div>
    </div>
    {{-- Categories container --}}
    <categories></categories>
@endsection
