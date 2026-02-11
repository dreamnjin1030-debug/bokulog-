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
        $posts = UserPost::with('userPostContents')
            ->latest()
            ->get();
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
        $validated = $request->validate([
            'boxer_id' => 'required|exists:boxers,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        //ログインユーザーIDを追加
        $validated['user_id'] = Auth::id();

        //保存（1回だけ)
        UserPost::create($validated);

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
            'rating' => 'required|integer|min:1|max:10',
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

    public function show(UserPost $userPost)
    {
        $userPost->load('userPostContents.user');
        return view('user_posts.show', compact('userPost'));
    }
}
