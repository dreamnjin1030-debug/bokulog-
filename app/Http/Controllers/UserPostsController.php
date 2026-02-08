<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{
    //　一覧
    public function index()
    {
        $posts = UserPost::orderBy('created_at', 'desc')->get();
        return view('user_posts.index', compact('posts'));
    }

    //新規作成画面
    public function create()
    {
        return view('user_posts.create');
    }

    // 保存
    public function store(Request $request)
    {
        $request->validate([
            'boxer_id' => 'required|exists:boxers,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        UserPost::create([
            'user_id' => Auth::id(), // ログインユーザー
            'boxer_id' => $request->boxer_id,
            'title' => $request->title,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user_posts.index')->with('success', '投稿を作成しました');
    }
    //編集画面
    public function  edit(UserPost $userPost)
    {
        return view('user_posts.edit', compact('userPost'));
    }
    //更新
    public function update(Request $request, UserPost $userPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $userPost->update([
            'title' => $request->title,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user_posts.index')->with('success', '投稿を更新しました');
    }

    //削除
    public function delete(UserPost $userPost)
    {
        $userPost->delete();
        return redirect()->route('user_posts.index')->with('success', '投稿を削除しました');
    }
}
