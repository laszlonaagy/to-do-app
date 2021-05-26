<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use DB;

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

    public function userTodos($user_id)
    {

        $todos = DB::table('users')
            ->join('to_dos', 'users.id', '=', 'to_dos.user_id')
            ->join('priorities', 'to_dos.priority_value', '=', 'priorities.priority_value')
            ->select('to_dos.id', 'to_dos.title', 'to_dos.description', 'to_dos.deadline', 'to_dos.attachment', 'priorities.name as priority_value')
            ->where( 'users.id', $user_id)
            ->orderBy('priorities.priority_value','desc')
            ->orderBy('to_dos.deadline','desc')
            ->get();

      //  $todos = User::with('todos')->find($user_id);

        return response()->json($todos,200);
    }
}
