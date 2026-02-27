<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoxerPostCommentRequest;
use App\Http\Requests\UpdateBoxerPostCommentRequest;
use App\Models\BoxerPost;
use App\Models\BoxerPostComment;
use Illuminate\Support\Facades\Auth;

class BoxerPostCommentController extends Controller
{
    public function store(StoreBoxerPostCommentRequest $request, BoxerPost $post)
    {
        BoxerPostComment::create([
            'boxer_post_id' => $post->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back();
    }

    public function edit(BoxerPostComment $comment)
    {
        return view('boxer_post_comments.edit', compact('comment'));
    }

    public function update(UpdateBoxerPostCommentRequest $request, BoxerPostComment $comment)
    {
        $comment->update([
            'comment' => $request->comment,
        ]);

        $boxer = $comment->post->boxer;

        return redirect()->route('boxer_posts.index', $boxer);
    }

    public function destroy(BoxerPostComment $comment)
    {
        $comment->delete();

        return back();
    }
}
