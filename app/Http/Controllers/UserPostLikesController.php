<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use Illuminate\Support\Facades\Auth;

class UserPostLikesController extends Controller
{
    public function store(UserPost $userPost)
    {
        $userPost->likedUsers()->syncWithoutDetaching([Auth::id()]); //いいねをつける。（既にあればなにもしない）

        return back();
    }

    public function destroy(UserPost $userPost)
    {
        $userPost->likedUsers()->detach(Auth::id()); //いいねを外す

        return back();
    }
}
