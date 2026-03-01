@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen py-16 text-white">
    <div class="max-w-2xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-3xl font-bold text-red-400 mb-10">
            📝 投稿編集
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">

            <form action="{{ route('user_posts.update', $userPost) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- タイトル --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        タイトル
                    </label>
                    <input type="text"
                        name="title"
                        value="{{ old('title', $userPost->title) }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                </div>

                {{-- 本文 --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        本文
                    </label>
                    <textarea name="comment"
                        rows="5"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">{{ old('comment', $userPost->comment) }}</textarea>
                </div>

                {{-- 評価 --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        評価
                    </label>

                    <select name="rating"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                            {{ old('rating', $userPost->rating) == $i ? 'selected' : '' }}>
                            {{ $i }} 点
                            </option>
                            @endfor
                    </select>
                </div>

                {{-- ボタンエリア --}}
                <div class="flex justify-between items-center pt-4">

                    <a href="{{ route('user_posts.show', $userPost) }}"
                        class="text-slate-400 hover:text-white text-sm transition">
                        ← 戻る
                    </a>

                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                        更新する
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>
@endsection