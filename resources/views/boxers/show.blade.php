@extends('layouts.app')

@section('content')
<div class="bg-slate-900 border border-slate-800 rounded-3xl p-10 shadow-2xl relative ">

    {{-- 投げ銭 --}}
    <a href="{{ route('donate', $boxer->id) }}"
        class=" absolute top-5 right-5 inline-block bg-yellow-500 hover:bg-yellow-600 px-8 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105">

        💰 投げ銭する(500円)
    </a>

    {{-- 名前 --}}
    <h1 class="text-4xl font-extrabold text-red-400 text-center mb-6">
        🥊 {{ $boxer->user->name }}

    </h1>


    {{-- フォロワー --}}
    <div class="flex  items-center justify-center gap-6 mb-4">

        <span class="text-slate-400">
            👥 フォロワー {{ $boxer->followedUsers()->count() }}
        </span>

        @auth
        @if($boxer->isFollowedBy(auth()->user()))
        <form action="{{ route('boxers.unfollow', $boxer) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="bg-slate-700 hover:bg-slate-600 px-6 py-2 rounded-full transition">
                フォロー解除
            </button>

        </form>
        @else
        <form action="{{ route('boxers.follow', $boxer) }}" method="POST">
            @csrf

            <button class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105">
                🔥 フォローする
            </button>

        </form>
        @endif
        @endauth

    </div>


    {{-- 戦績 --}}
    <div class="flex justify-center gap-6 text-xl font-semibold mb-8">

        <span class="bg-green-600/20 text-green-400 px-6 py-3 rounded-full">
            {{ $boxer->win }} 勝
        </span>

        <span class="bg-red-600/20 text-red-400 px-6 py-3 rounded-full">
            {{ $boxer->lose }} 敗
        </span>

        <span class="bg-yellow-500/20 text-yellow-400 px-6 py-3 rounded-full">
            {{ $boxer->draw }} 分
        </span>

    </div>

    {{-- タイトル --}}
    @if($boxer->titles)
    <div class="text-center mb-8">

        <p class="text-yellow-400 text-2x1 font-semibold">
            🏆 獲得タイトル
        </p>

        <p class="text-slate-300 mt-2">
            {{ $boxer->titles }}
        </p>

    </div>
    @endif

    {{-- 自己紹介 --}}
    @if($boxer->comment)
    <div class="text-center text-2x1 max-w-xl mx-auto mb-10">

        <p class="text-slate-400 font-semibold mb-2">
            自己紹介
        </p>

        <p class="text-slate-300 leading-relaxed">
            {{ $boxer->comment }}
        </p>

    </div>
    @endif

    {{-- 投稿一覧ボタン --}}
    <div class="text-center">

        <a href="{{ route('boxer_posts.index', $boxer) }}"
            class="inline-block bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105">

            このボクサーの投稿を見る

        </a>

    </div>

</div>
@endsection