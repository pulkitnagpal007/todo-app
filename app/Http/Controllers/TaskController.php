<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    public function index()
    {
        return view('tasks.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tasks'
        ]);

        Task::create([
            'title' => $request->title,
            'completed' => false
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true]);
    }

    public function allTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

}
