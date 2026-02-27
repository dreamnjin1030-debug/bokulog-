<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoxerPost;

class BoxerPostLikesController extends Controller
{
    public function store(Request $request, BoxerPost $post)
    {
        $user = $request->user();

        $post->likedUsers()->syncWithoutDetaching([
            $user->id
        ]);

        return back();
    }

    public function destroy(Request $request, BoxerPost $post)
    {
        $user = $request->user();

        $post->LikedUsers()->detach($user->id);

        return back();
    }
}
