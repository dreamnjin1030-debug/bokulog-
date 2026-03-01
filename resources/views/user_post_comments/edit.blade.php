@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen py-16 text-white">
    <div class="max-w-xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-2xl font-bold text-red-400 mb-8">
            ✏️ コメント編集
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">

            <form action="{{ route('user_post_comments.update', $comment) }}"
                method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- コメント入力 --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-400 mb-2">
                        コメント内容
                    </label>

                    <textarea name="comment"
                        rows="4"
                        required
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4
                                     focus:outline-none focus:border-red-500
                                     focus:ring-1 focus:ring-red-500
                                     transition resize-none">{{ old('comment', $comment->comment) }}</textarea>
                </div>

                {{-- ボタンエリア --}}
                <div class="flex justify-between items-center pt-4">

                    <a href="{{ route('user_posts.show', $comment->user_post_id) }}"
                        class="text-slate-400 hover:text-white text-sm transition">
                        ← 投稿に戻る
                    </a>

                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full
                                   font-semibold shadow-lg transition transform hover:scale-105">
                        更新する
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>
@endsection