@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-6xl mx-auto px-6">

        {{-- ヘッダー --}}
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-red-400 mb-4">
                🏢 {{ $gym->name }}
            </h1>

            <p class="text-slate-400 text-lg">
                📍 {{ $gym->address }}
            </p>
        </div>

        {{-- 所属ボクサー --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold border-b border-slate-800 pb-3 mb-6">
                🥊 所属ボクサー
            </h2>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($gym->boxers as $boxer)
                <a href="{{ route('boxers.show', $boxer) }}"
                    class="group bg-slate-900 border border-slate-800 rounded-xl p-5 shadow-lg
                              hover:border-red-500 hover:shadow-xl
                              transition duration-300 transform hover:-translate-y-1">

                    <div class="text-lg font-semibold text-white group-hover:text-red-400 transition">
                        {{ $boxer->user->name }}
                    </div>

                    <div class="text-xs text-slate-500 mt-2">
                        詳細を見る →
                    </div>

                </a>
                @empty
                <p class="text-slate-500">所属ボクサーはいません。</p>
                @endforelse
            </div>
        </div>

        {{-- 地図 --}}
        <div>
            <h2 class="text-2xl font-bold border-b border-slate-800 pb-3 mb-6">
                🗺 アクセス
            </h2>

            <div class="rounded-2xl overflow-hidden shadow-2xl border border-slate-800">
                <iframe
                    class="w-full h-96"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps?q={{ urlencode($gym->address) }}&output=embed">
                </iframe>
            </div>
        </div>

        {{-- 戻るリンク --}}
        <div class="mt-12">
            <a href="{{ route('gyms.index') }}"
                class="text-slate-400 hover:text-white transition text-sm">
                ← ジム一覧に戻る
            </a>
        </div>

    </div>
</div>
@endsection