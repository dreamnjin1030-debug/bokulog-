<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoxerApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BoxerApplicationController extends Controller
{

    public function create()
    {
        return view('boxers.apply');
    }

    public function store(Request $request)
    {

        $request->validate([
            'license_number' => 'required|string|max:16',
            'license_image' => 'required|image|max:2048'
        ]);

        $path = $request->file('license_image')->store('licenses', 'public');

        BoxerApplication::create([
            'user_id' => Auth::id(),
            'license_number' => $request->license_number,
            'license_image' => $path,
            'status' => 'pending'
        ]);

        return redirect()->route('boxers.index')->with('success', '申請を送信しました');
    }
}
