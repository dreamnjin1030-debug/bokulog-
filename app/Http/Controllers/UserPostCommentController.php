<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Models\UserPostComment;
use App\Http\Requests\StoreUserPostCommentRequest;
use App\Http\Requests\UpdateUserPostCommentRequest;
use Illuminate\Support\Facades\Auth;

class UserPostCommentController extends Controller
{
    // コメント作成機能
    public function store(StoreUserPostCommentRequest $request, UserPost $userPost)
    {
        $validated = $request->validated();

        $userPost->userPostComments()->create([
            'user_id' => $validated['user_id'],
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'コメントを追加しました');
    }

    // 編集機能
    public function edit(UserPostComment $comment)
    {
        return view('user_post_comments.edit', compact('comment'));
    }

    // 更新機能
    public function update(UpdateUserPostCommentRequest $request, UserPostComment $comment)
    {
        $comment->update($request->validated());

        return redirect()->route('user_posts.show', $comment->user_post_id);
    }

    // 削除機能
    public function destroy(UserPostComment $comment)
    {
        $comment->delete();

        return back()->with('success', 'コメントを削除しました');
    }
}
