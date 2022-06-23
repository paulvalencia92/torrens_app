<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return view('users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }
}
