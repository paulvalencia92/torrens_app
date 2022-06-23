<?php

namespace App\Http\Controllers;

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
}
