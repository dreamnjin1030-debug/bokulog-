<?php

namespace App\Http\Controllers;

use App\Models\Boxer;
use Illuminate\Http\Request;

class BoxerFollowController extends Controller
{
    public function store(Request $request, Boxer $boxer)
    {
        $user = $request->user();

        $user->followingBoxers()->syncWithoutDetaching([
            $boxer->id
        ]);

        return back();
    }

    public function destroy(Request $request, Boxer $boxer)
    {
        $user = $request->user();

        $user->followingBoxers()->detach($boxer->id);

        return back();
    }
}
