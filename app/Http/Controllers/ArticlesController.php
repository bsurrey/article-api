<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // get all articles & hide the text field
    public function index()
    {
        return ArticleResource::collection(Article::all()->makeHidden('text'));
    }

    // create a new article
    public function store(Request $request)
    {
        $request->validate(Article::validationRules());

        $article = Article::create([
            'name'              => $request->name,
            'text'              => $request->text,
            'author'            => $request->auhor,
            'publication_date'  => $request->publication_date,
            'created_at'        => $request->created_at,
            'expiration_date'   => $request->expiration_date,
        ]);

        return new ArticleResource($article);
    }

    // show a single article
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    // update a single article
    public function update(Request $request, Article $article)
    {
        $request->validate(Article::validationRules());

        $article->update($request->only([
            'name',
            'author',
            'text',
            'publication_date',
            'expiration_date',
        ]));

        return new ArticleResource($article);
    }

    // delete a single article
    public function destroy(Article $article)
    {
        $article
            ->delete();

        return response()
            ->json(true, 204);
    }
}
