@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-6xl mx-auto px-6">

        {{-- タイトル＆作成ボタン --}}
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-4xl font-extrabold text-red-400">
                🥊 ボクサー一覧
            </h1>

            <a href="{{ route('boxers.create') }}"
                class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                + 新規ボクサー作成
            </a>
        </div>

        {{-- グリッド --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse ($boxers as $boxer)
            <a href="{{ route('boxers.show', $boxer) }}"
                class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg
                          hover:border-red-500 hover:shadow-2xl
                          transition duration-300 transform hover:-translate-y-1">

                {{-- 名前 --}}
                <h2 class="text-xl font-bold text-white group-hover:text-red-400 transition mb-4">
                    {{ $boxer->user->name }}
                </h2>

                {{-- 戦績 --}}
                <div class="flex gap-3 text-sm font-semibold">

                    <span class="bg-green-600/20 text-green-400 px-3 py-1 rounded-full">
                        {{ $boxer->win }} 勝
                    </span>

                    <span class="bg-red-600/20 text-red-400 px-3 py-1 rounded-full">
                        {{ $boxer->lose }} 敗
                    </span>

                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                        {{ $boxer->draw }} 分
                    </span>

                </div>

                <div class="mt-4 text-xs text-slate-500">
                    詳細を見る →
                </div>

            </a>
            @empty
            <p class="text-slate-500">ボクサーが登録されていません。</p>
            @endforelse

        </div>

    </div>
</div>
@endsection