@extends('layouts.app')

@section('content')
    <div class=" mx-auto my-8 max-w-2xl ">
        <h1 class="text-2xl font-bold mb-4">
            {{ $task->exists ? 'Edit Task' : 'Add New Task' }}
        </h1>

        <form method="POST" action="{{ $task->exists ? route('tasks.update', $task) : route('tasks.store') }}">
            @csrf
            @if ($task->exists)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="title" class="block font-bold">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" 
                       required class="border rounded px-2 py-1 w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-bold">Description</label>
                <textarea name="description" id="description" 
                          class="border rounded px-2 py-1 w-full">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-bold">Status</label>
                <select name="status" id="status" class="border rounded px-2 py-1">
                    <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded ">
                {{ $task->exists ? 'Update Task' : 'Add Task' }} 
            </button>
        </form>
    </div>
@endsection
