@extends('layouts.app')

@section('content')
    <div class="container mx-auto ">

        <!-- Filter Form -->
        <div class="flex  justify-between align-middle items-center mb-4">
            <form method="GET" action="{{ route('tasks.index') }}" class="mb-4  ">
                <label for="status" class="mr-2">Filter by Status:</label>
                <select name="status" id="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </form>

            <a href="{{ route('tasks.create') }}" class="bg-green-300 rounded-full px-3 py-2 w-fit border-green-400 border">
                Add Task +
            </a>
            
        </div>

        <!-- Add Task Form -->
        {{-- <form method="POST" action="{{ route('tasks.store') }}" class="mb-4 ">
            @csrf
            <div class="flex gap-2">
                <input type="text" name="title" placeholder="Task title" required class="border rounded px-2 py-1 flex-1">
                <textarea name="description" placeholder="Task description (optional)" class="border rounded px-2 py-1 flex-1"></textarea>
                <select name="status" class="border rounded px-2 py-1">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Task</button>
            </div>
        </form> --}}

        <!-- Tasks Table -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->description }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($task->status) }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
