<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; /* use Illuminate\Http\Request; as Request とおなじ   */
use App\Todo; /* use App\Todo as Todo とおなじ   */

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo(); /* new \App\Todo(); とおなじ */
        $todos = $todo->all();

        return view('todo.index',['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        dd($inputs);
        
        $todo = new Todo();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

}
