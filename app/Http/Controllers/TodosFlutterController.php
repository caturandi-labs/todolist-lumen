<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TodosFlutterController extends Controller
{
    use ApiResponser;
   
    private $rules = [
        'name' => 'required|max:255'
    ];


    public function index()
    {
        return response()->json(Todo::all(), 200);
    }

    public function show(int $id)
    {
        $todo = Todo::findOrFail($id);
        return response()->json($todo,200);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, $this->rules);

        $todo = Todo::create($request->all());

        return response()->json($todo,201);

    }

    public function update(Request $request,  int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->is_done = $request->input('is_done');
        $todo->update();
        return response()->json($todo,200);
    }

    public function destroy(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(null,200);
    }
}
