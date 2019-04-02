<?php

namespace App\Http\Controllers;

use App\Article;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class ArticlesController extends Controller
{
    use ApiResponser;
   
    private $rules = [
        'published_at' => 'required',
        'post_title' => 'required',
        'content' => 'required'
    ];


    public function index()
    {
        return $this->successResponse(Article::all());
    }

    public function show(int $id)
    {
        $article = Article::findOrFail($id);
        return $this->successResponse($article);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $this->errorResponse($validator, 401);
        }

        $article = Article::create($request->all());
        return $this->successResponse($article, Response::HTTP_CREATED);

    }

    public function update(Request $request,  int $id)
    {

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $this->errorResponse($validator, 401);
        }

        $article = Article::findOrFail($id);
        $article->post_title = $request->input('post_title');
        $article->content = $request->input('content');
        $article->update();
        return $this->successResponse($article);
    }

    public function destroy(int $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return $this->successResponse($article);
    }
}
