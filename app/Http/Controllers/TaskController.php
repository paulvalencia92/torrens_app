<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $admin = auth()->user()->isAdmin();

        $tasks = Task::query()
            ->when(!$admin, fn($query) => $query->fromUser())
            ->get();

        return view('tasks.index', compact('tasks'));
    }


    public function store(TasksRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    public function update(TasksRequest $request, Task $task)
    {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->update();
        return redirect()->route('tasks.index');

    }

    public function destroy(Task $task)
    {
        try {
            if (request()->ajax()) {
                $task->delete();
                return redirect()->route('tasks.index');
            } else {
                abort(401);
            }
        } catch (\Exception $exception) {
            session()->flash("message", ["danger", $exception->getMessage()]);
        }

    }

}
