<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\TagResource;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate(Tag::validationRules());

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return new TagResource($tag);
    }

    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
