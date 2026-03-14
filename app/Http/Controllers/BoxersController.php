<?php

namespace App\Http\Controllers;

use App\Models\Boxer;
use App\Models\Gym;
use App\Http\Requests\StoreBoxerRequest;
use App\Http\Requests\UpdateBoxerRequest;
use Illuminate\Support\Facades\Auth;


class BoxersController extends Controller
{
    public function index()
    {
        $boxers = Boxer::with('user')->get();

        return view('boxers.index', compact('boxers'));
    }

    public function create()
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        $gyms = Gym::all();

        return view('boxers.create', compact('gyms'));
    }

    public function store(StoreBoxerRequest $request)
    {
        $data = $request->validated();
        //この$dataはこのメソッドの中だけで使える

        if ($request->hasFile('pictures')) {
            $path = $request->file('pictures')->store('boxers', 'public');
            // この$pathもこのifブロック内で作られて、

            $data['pictures'] = $path; //ここで $data に入れてる。
        }

        $boxer = Boxer::create($data); //ここで使う。

        return redirect()->route('boxers.show', $boxer);
    }

    public function edit(Boxer $boxer)
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        return view('boxers.edit', compact('boxer'));
    }

    public function update(UpdateBoxerRequest $request, Boxer $boxer)
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }
        // バリデーション済みデータ
        $data = $request->validated();

        //　画像があれば差し替え
        if ($request->hasFile('pictures')) {
            $path = $request->file('pictures')->store('boxers', 'public');
            $data['pictures'] = $path;
        }

        //　更新
        $boxer->update($data);

        // リダイレクト
        return redirect()->route('boxers.show', $boxer);
    }

    public function show(Boxer $boxer)
    {
        return view('boxers.show', compact('boxer'));
    }
}
