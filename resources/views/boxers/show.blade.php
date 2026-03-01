@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-4xl mx-auto px-6">

        {{-- ヒーローセクション --}}
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-10 shadow-2xl mb-12">

            <h1 class="text-4xl font-extrabold text-red-400 mb-4">
                🥊 {{ $boxer->user->name }}
            </h1>

            <div class="flex items-center gap-6 mb-6">
                <span class="text-slate-400">
                    👥 フォロワー {{ $boxer->followedUsers()->count() }}
                </span>

                {{-- フォローボタン --}}
                @auth
                @if($boxer->isFollowedBy(auth()->user()))
                <form action="{{ route('boxers.unfollow', $boxer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-slate-700 hover:bg-slate-600 px-5 py-2 rounded-full transition">
                        フォロー解除
                    </button>
                </form>
                @else
                <form action="{{ route('boxers.follow', $boxer) }}" method="POST">
                    @csrf
                    <button class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                        🔥 フォローする
                    </button>
                </form>
                @endif
                @endauth
            </div>

            {{-- 戦績 --}}
            <div class="flex flex-wrap gap-4 text-lg font-semibold mb-6">

                <span class="bg-green-600/20 text-green-400 px-4 py-2 rounded-full">
                    {{ $boxer->win }} 勝
                </span>

                <span class="bg-red-600/20 text-red-400 px-4 py-2 rounded-full">
                    {{ $boxer->lose }} 敗
                </span>

                <span class="bg-yellow-500/20 text-yellow-400 px-4 py-2 rounded-full">
                    {{ $boxer->draw }} 分
                </span>

            </div>

            {{-- タイトル --}}
            @if($boxer->titles)
            <div class="mb-6">
                <p class="text-yellow-400 font-semibold">
                    🏆 獲得タイトル
                </p>
                <p class="text-slate-300 mt-2">
                    {{ $boxer->titles }}
                </p>
            </div>
            @endif

            {{-- 自己紹介 --}}
            @if($boxer->comment)
            <div class="mb-6">
                <p class="text-slate-400 font-semibold mb-2">
                    自己紹介
                </p>
                <p class="text-slate-300 leading-relaxed">
                    {{ $boxer->comment }}
                </p>
            </div>
            @endif

            {{-- SNS --}}
            @if($boxer->sns_url)
            <div class="mb-6">
                <a href="{{ $boxer->sns_url }}"
                    target="_blank"
                    class="text-blue-400 hover:underline">
                    🌐 SNSを見る
                </a>
            </div>
            @endif

            {{-- 編集リンク --}}
            <div class="mt-8">
                <a href="{{ route('boxers.edit', $boxer) }}"
                    class="text-sm text-slate-400 hover:text-white transition">
                    ✏️ プロフィール編集
                </a>
            </div>

        </div>

        {{-- 投稿リンク --}}
        <div class="text-center">
            <a href="{{ route('boxer_posts.index', $boxer) }}"
                class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                このボクサーの投稿を見る
            </a>
        </div>

    </div>
</div>
@endsection