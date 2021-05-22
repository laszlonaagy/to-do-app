<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        return ToDo::all();
    }

    public function show(ToDo $todo)
    {
        return $todo;
    }

    public function store(Request $request)
    {
        $todo = ToDo::create($request->all());

        return response()->json($todo, 201);
    }

    public function update(Request $request, ToDo $todo)
    {
        $todo->update($request->all());

        return response()->json($todo, 200);
    }

    public function delete(ToDo $todo)
    {
        $todo->delete();

        return response()->json(null, 204);
    }
}
