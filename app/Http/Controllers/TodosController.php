<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TodosController extends Controller
{
    use ApiResponser;
   
    private $rules = [
        'name' => 'required|max:255'
    ];


    public function index()
    {
        return $this->successResponse(Todo::all());
    }

    public function show(int $id)
    {
        $todo = Todo::findOrFail($id);
        return $this->successResponse($todo);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, $this->rules);

        $todo = Todo::create($request->all());

        return $this->successResponse($todo, Response::HTTP_CREATED);

    }

    public function update(Request $request,  int $id)
    {
        $this->validate($request, $this->rules);
        $todo = Todo::findOrFail($id);
        $todo->fill($request->all());

        // if($todo->isClean()) {
        //     return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        $todo->update();

        return $this->successResponse($todo);
    }

    public function destroy(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return $this->successResponse($todo);
    }
}
