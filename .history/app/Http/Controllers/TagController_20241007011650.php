<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tag' => 'required|string|unique:tags',
            ],
            #error message
            [
                'tag.unique' => "The tag has been Created already."
            ]
        );

        $tag = new Tag();
        $tag->tag = ucwords(strtolower($data['tag']));
        $tag->save();

        return redirect()->route('tag.index');
    }

    public function index()
    {
        $tags = Tag::all()->sortByDesc('id');
        return view('tag.index', compact('tags'));
    }

    public function edit(int $tagId)
    {
        $tag = Tag::find($tagId);

        if (!is_null($tag)) {
            return view('tag.edit', compact('tag'));
        }

        return ErrorController::error404();
    }

    public function update(Request $request, int $tagId)
    {
        $tag = Tag::findOrFail($tagId);

        $data = $request->validate(
            [
                'tag' => 'required|string|unique:tags',
            ],
            [
                'tag.unique' => "$tag->tag has already been created."
            ]
        );

        $tag->tag = ucwords(strtolower($data['tag']));
        $tag->update();

        return redirect()->route('tag.index');
    }

    public function delete(int $tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
