@extends('layouts.app')

@section('content')
<div class=" bg-slate-100 min-h-screen py-16 text-black">
    <div class="max-w-2xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-3xl font-bold text-red-400 mb-10">
            🔥 新規投稿
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">

            <form action="{{ route('user_posts.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- ボクサーID --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        ボクサーID
                    </label>
                    <input type="number"
                        name="boxer_id"
                        value="{{ old('boxer_id') }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                </div>

                {{-- タイトル --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        タイトル
                    </label>
                    <input type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                </div>

                {{-- 本文 --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        本文
                    </label>
                    <textarea name="comment"
                        rows="5"
                        placeholder="🥊 試合の感想や分析を書こう..."
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">{{ old('comment') }}</textarea>
                </div>

                {{-- 評価（スターUI） --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-3">
                        評価（1〜5）
                    </label>

                    <div class="flex flex-wrap gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <input
                            id="rating-{{ $i }}"
                            type="radio"
                            value="{{ $i }}"
                            name="rating"
                            class="sr-only peer"
                            {{ old('rating') == $i ? 'checked' : '' }}>

                            <label for="rating-{{ $i }}"
                                class="cursor-pointer px-3 py-1 rounded-full border border-slate-700 bg-slate-800 text-slate-300
                                             peer-checked:bg-yellow-400 peer-checked:text-black
                                             hover:border-yellow-400 transition">
                                {{ $i }}
                            </label>
                            @endfor
                    </div>
                </div>

                {{-- ボタンエリア --}}
                <div class="flex justify-between items-center pt-6">

                    <a href="{{ route('user_posts.index') }}"
                        class="text-slate-400 hover:text-white text-sm transition">
                        ← 一覧に戻る
                    </a>

                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 px-8 py-2 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                        投稿する
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>
@endsection