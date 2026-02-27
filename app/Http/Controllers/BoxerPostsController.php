<?php

namespace App\Http\Controllers;

use App\Models\Boxer;
use App\Models\BoxerPost;
use App\Http\Requests\StoreBoxerPostsRequest;
use App\Http\Requests\UpdateBoxerPostsRequest;

class BoxerPostsController extends Controller
{
    public function index(Boxer $boxer)
    {
        $posts = $boxer->posts()
            ->with(['comments.user'])
            ->latest()
            ->get();

        return view('boxer_posts.index', compact('boxer', 'posts'));
    }

    public function create(Boxer $boxer)
    {
        return view('boxer_posts.create', compact('boxer'));
    }

    public function store(StoreBoxerPostsRequest $request, Boxer $boxer)
    {
        $validated = $request->validated();

        $boxer->posts()->create($validated);

        return redirect()->route('boxer_posts.index', $boxer);
    }

    public function edit(BoxerPost $post)
    {
        return view('boxer_posts.edit', compact('post'));
    }

    public function update(UpdateBoxerPostsRequest $request, BoxerPost $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('boxer_posts.index', $post->boxer);
    }

    public function destroy(BoxerPost $post)
    {
        $post->delete();

        return back();
    }
}
