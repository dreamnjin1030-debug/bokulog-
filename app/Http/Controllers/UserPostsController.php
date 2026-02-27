<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{
    //　一覧
    public function index()
    {
        $posts = UserPost::withCount('userPostComments')
            ->latest()
            ->with('likedUsers')
            ->get();

        return view('user_posts.index', compact('posts'));
    }

    // 新規作成画面
    public function create()
    {
        return view('user_posts.create');
    }

    // 保存
    public function store(StoreUserPostRequest $request)
    {
        $validated = $request->validated();
        // ログインユーザーIDを追加
        $validated['user_id'] = Auth::id();

        // 保存（1回だけ)
        UserPost::create($validated);

        return redirect()->route('user_posts.index');
    }

    // 投稿に対するコメント
    public function show(UserPost $userPost)
    {
        return view('user_posts.show', compact('userPost'));
    }

    // 編集画面
    public function  edit(UserPost $userPost)
    {
        return view('user_posts.edit', compact('userPost'));
    }
    // 更新
    public function update(UpdateUserPostRequest $request, UserPost $userPost)
    {
        $userPost->update($request->validated());

        return redirect()->route('user_posts.index');
    }

    // 削除
    public function delete(UserPost $userPost)
    {
        $userPost->delete();
        return redirect()->route('user_posts.index');
    }
}
