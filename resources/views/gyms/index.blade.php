@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen py-16 text-white">
    <div class="max-w-6xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-3xl font-bold text-red-400 mb-12">
            🏢 ジム一覧
        </h1>

        {{-- グリッドレイアウト --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($gyms as $gym)
            <a href="{{ route('gyms.show', $gym) }}"
                class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg
                          hover:border-red-500 hover:shadow-2xl
                          transition duration-300 transform hover:-translate-y-1">

                {{-- ジム名 --}}
                <h2 class="text-xl font-semibold text-white group-hover:text-red-400 transition mb-3">
                    {{ $gym->name }}
                </h2>

                {{-- 住所（ある場合） --}}
                @if(!empty($gym->address))
                <p class="text-sm text-slate-400">
                    📍 {{ $gym->address }}
                </p>
                @endif

                {{-- 所属ボクサー数 --}}
                @if(method_exists($gym, 'boxers'))
                <p class="mt-4 text-xs text-slate-500">
                    🥊 所属ボクサー:
                    {{ $gym->boxers_count ?? $gym->boxers->count() }}人
                </p>
                @endif

            </a>
            @empty
            <p class="text-slate-500">ジムが登録されていません。</p>
            @endforelse

        </div>

    </div>
</div>
@endsection