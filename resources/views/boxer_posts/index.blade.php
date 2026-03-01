@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-3xl mx-auto px-6">

        {{-- ヘッダー --}}
        <div class="flex items-center justify-between mb-10">
            <h1 class="text-3xl font-bold tracking-wide">
                🥊 {{ $boxer->user->name }} の投稿
            </h1>

            <a href="{{ route('boxer_posts.create', $boxer) }}"
                class="bg-green-500 hover:bg-green-600 text-black font-semibold px-5 py-2 rounded-xl transition shadow-md">
                新規投稿
            </a>
        </div>

        {{-- 投稿ループ --}}
        @foreach($posts as $post)
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 mb-8 shadow-xl">

            {{-- 投稿本文 --}}
            <p class="text-slate-200 text-lg leading-relaxed mb-4">
                {{ $post->comment }}
            </p>

            {{-- いいねエリア --}}
            <div class="flex items-center gap-4 mb-4">

                <p class="text-sm text-slate-400">
                    ❤️ {{ $post->likedUsers->count() }}
                </p>

                @if($post->isLikedBy(auth()->user()))
                <form action="{{ route('boxer_posts.unlike', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-red-500 transition text-sm">
                        いいね解除
                    </button>
                </form>
                @else
                <form action="{{ route('boxer_posts.like', $post) }}" method="POST">
                    @csrf
                    <button class="text-slate-400 hover:text-red-400 transition text-sm">
                        いいね
                    </button>
                </form>
                @endif
            </div>

            {{-- 編集削除 --}}
            <div class="flex gap-4 text-sm mb-6">
                <a href="{{ route('boxer_posts.edit', $post) }}"
                    class="text-blue-400 hover:underline">
                    編集
                </a>

                <form action="{{ route('boxer_posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:underline"
                        onclick="return confirm('削除しますか？')">
                        削除
                    </button>
                </form>
            </div>

            {{-- コメント一覧 --}}
            <div class="space-y-3 mb-4 border-t border-slate-800 pt-4">
                @foreach($post->comments as $comment)
                <div class="bg-slate-800 rounded-xl p-3">

                    <div class="flex justify-between items-center text-sm mb-1">
                        <span class="font-semibold text-green-400">
                            {{ $comment->user->name }}
                        </span>

                        <div class="flex gap-3 text-xs">
                            <a href="{{route('boxer_post_comments.edit', $comment)}}"
                                class="text-blue-400 hover:underline">
                                編集
                            </a>

                            <form action="{{route('boxer_post_comments.destroy', $comment)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:underline"
                                    onclick="return confirm('削除しますか？')">
                                    削除
                                </button>
                            </form>
                        </div>
                    </div>

                    <p class="text-slate-300 text-sm">
                        {{ $comment->comment }}
                    </p>
                </div>
                @endforeach
            </div>

            {{-- コメント投稿 --}}
            <form method="POST"
                action="{{ route('boxer_post_comments.store', $post) }}"
                class="mt-4">
                @csrf

                <textarea name="comment"
                    rows="3"
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-green-500"
                    placeholder="コメントを書く"></textarea>

                @error('comment')
                <div class="text-red-400 text-sm mt-1">
                    {{ $message }}
                </div>
                @enderror

                <button type="submit"
                    class="mt-3 bg-green-500 hover:bg-green-600 text-black font-semibold px-5 py-2 rounded-xl transition shadow">
                    コメントする
                </button>
            </form>

        </div>
        @endforeach

    </div>
</div>
@endsection