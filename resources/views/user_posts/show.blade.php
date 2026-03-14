@extends('layouts.app')

@section('content')
<div class="text-white min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4">

        {{-- 投稿カード --}}
        <div class="bg-slate-700 text-white rounded-2xl p-8 shadow-xl border border-slate-800 mb-10">

            <h2 class="text-3xl font-bold text-red-600 mb-4">
                {{ $userPost->title }}
            </h2>

            <p class="text-white leading-relaxed mb-6">
                {{ $userPost->comment }}
            </p>

            {{-- 評価 --}}
            <div class="flex items-center mb-3">
                <span class="mr-3 font-semibold text-slate-400">評価:</span>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <=$userPost->rating)
                    <span class="text-yellow-400 text-xl">★</span>
                    @else
                    <span class="text-slate-600 text-xl">★</span>
                    @endif
                    @endfor
            </div>

            {{-- ボクサー --}}
            <p class="text-sm text-slate-500 mb-4">
                対象ボクサー: {{ $userPost->boxer->user->name }}
            </p>

            <div class="text-sm text-slate-500">
                📅 {{ $userPost->created_at->format('Y年m月d日 H:i') }}
            </div>
        </div>

        {{-- コメントセクション --}}
        <h3 class="text-2xl font-bold mb-6 border-b border-slate-700 pb-2">
            💬 コメント
        </h3>

        @forelse ($userPost->userPostComments as $comment)
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-5 mb-6 shadow-md hover:border-red-500 transition">

            <div class="flex justify-between items-center mb-2">
                <strong class="text-red-400">
                    {{ $comment->user->name }}
                </strong>

                <span class="text-xs text-slate-500">
                    {{ $comment->created_at->format('Y/m/d H:i') }}
                </span>
            </div>

            <p class="text-slate-300 mb-4">
                {{ $comment->comment }}
            </p>

            @auth
            @if(Auth::id() === $comment->user_id)
            <div class="flex gap-4 text-sm">

                <a href="{{ route('user_post_comments.edit', $comment->id) }}"
                    class="text-blue-400 hover:underline">
                    編集
                </a>

                <form action="{{ route('user_post_comments.destroy', $comment->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('本当に削除しますか')"
                        class="text-slate-400 hover:text-red-500">
                        削除
                    </button>
                </form>
            </div>
            @endif
            @endauth

        </div>
        @empty
        <p class="text-slate-500">まだコメントはありません。</p>
        @endforelse


        {{-- コメント投稿フォーム --}}
        @auth
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 mt-10 shadow-lg">

            <form action="{{ route('user_post_comments.store', $userPost->id) }}" method="POST">
                @csrf

                <textarea name="comment"
                    rows="4"
                    placeholder="🔥 試合の感想を書こう..."
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white focus:outline-none focus:border-red-500 mb-4"></textarea>

                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full font-semibold shadow transition">
                    コメントする
                </button>
            </form>

            <div class="mt-6">
                <a href="{{ route('user_posts.index') }}"
                    class="text-slate-400 hover:text-white text-sm">
                    ← 投稿一覧に戻る
                </a>
            </div>

        </div>
        @endauth

    </div>
</div>
@endsection