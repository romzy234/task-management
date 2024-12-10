<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index(Request $request)
{
    $tasks = Task::where('user_id', auth()->id())
                ->when($request->status, function($query, $status) {
                    return $query->where('status', $status);
                })
                ->get();
    return view('tasks.index', compact('tasks'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('tasks.form', ['task' => new Task()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'status'=>'in:pending,complete',
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title'=> $request->title,
            'description'=>$request->description,
            'status'=> $request->status ?? 'pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
    return view('tasks.form', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'in:pending,completed',
        ]);
    
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');

    }
}
