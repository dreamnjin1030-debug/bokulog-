<?php

namespace App\Http\Controllers;

use App\Models\Boxer;
use App\Http\Requests\StoreBoxerRequest;
use App\Http\Requests\UpdateBoxerRequest;


class BoxersController extends Controller
{
    public function index()
    {
        $boxers = Boxer::with('user')->get();

        return view('boxers.index', compact('boxers'));
    }

    public function create()
    {
        return view('boxers.create');
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
        return view('boxers.edit', compact('boxer'));
    }

    public function update(UpdateBoxerRequest $request, Boxer $boxer)
    {
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
