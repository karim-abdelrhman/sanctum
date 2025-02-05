<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::query()->with(['posts'])->paginate(15));
    }

    public function show($id)
    {
        return UserResource::make(User::query()->findOrFail($id));
    }

    public function create()
    {
        return view('create_user');
    }

    public function store(Request $request)
    {
//        dd($request);
        $credentials = $request->only(['name', 'email', 'password']);
        User::create($credentials);
        return back();
    }
}
