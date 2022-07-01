<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // return all tags
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    // create a new tag
    public function store(Request $request)
    {
        $request->validate(Tag::validationRules());

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return new TagResource($tag);
    }

    // get a single tag
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(Tag::validationRules());

        $tag->update($request->only([
            'name',
        ]));

        return new TagResource($tag);
    }

    // delete tag
    public function destroy(Tag $tag)
    {
        $tag
            ->delete();

        return response()
            ->json(true, 204);
    }
}
