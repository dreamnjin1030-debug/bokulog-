@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-2xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-3xl font-bold mb-8 tracking-wide">
            🥊 {{ $boxer->user->name }} の新規投稿
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl">

            <form method="POST"
                action="{{ route('boxer_posts.store', $boxer) }}"
                class="space-y-6">
                @csrf

                {{-- 投稿内容 --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        投稿内容
                    </label>

                    <textarea name="comment"
                        rows="6"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-4 text-slate-200 focus:outline-none focus:ring-2 focus:ring-green-500 transition resize-none"
                        placeholder="🔥 試合への意気込みやファンへのメッセージを書こう...">{{ old('comment') }}</textarea>

                    @error('comment')
                    <div class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- ボタン --}}
                <div class="flex justify-between items-center pt-4">

                    <a href="{{ route('boxer_posts.index', $boxer) }}"
                        class="text-slate-400 hover:text-white transition">
                        ← 投稿一覧に戻る
                    </a>

                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-black font-bold px-8 py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                        投稿する
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>
@endsection