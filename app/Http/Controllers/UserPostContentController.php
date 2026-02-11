<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Models\UserPostContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostContentController extends Controller
{
    public function store(Request $request, UserPost $userPost)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'author'  => 'nullable|string|max:50',
        ]);

        $userPost->userPostContents()->create([
            'user_id' => Auth::id(),
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return back()->with('success', 'コメントを追加しました');
    }
}
