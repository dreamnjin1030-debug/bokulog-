<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoxerApplication;
use App\Models\User;

class AdminBoxerApplicationController extends Controller
{

    // 申請一覧
    public function index()
    {

        $applications = BoxerApplication::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.index', compact('applications'));
    }


    // 申請詳細
    public function show($id)
    {

        $application = BoxerApplication::with('user')->findOrFail($id);

        return view('admin.show', compact('application'));
    }


    // 承認
    public function approve($id)
    {

        $application = BoxerApplication::findOrFail($id);

        $application->status = 'approved';
        $application->save();

        // userをboxerにする
        $user = User::find($application->user_id);
        $user->role = 'boxer';
        $user->save();

        return redirect()
            ->route('boxers.create')
            ->with('success', '認証されましたので自分のページを作成してください');
    }


    // 拒否
    public function reject($id)
    {

        $application = BoxerApplication::findOrFail($id);

        $application->status = 'rejected';
        $application->save();

        return redirect()
            ->route('user_posts.index')
            ->with('error', '承認されませんでした');
    }
}
