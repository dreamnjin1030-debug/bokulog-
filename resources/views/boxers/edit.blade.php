@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-3xl font-bold text-red-400 mb-10">
            🥊 ボクサープロフィール編集
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-10 shadow-2xl">

            <form method="POST"
                action="{{ route('boxers.update', $boxer) }}"
                class="space-y-8">
                @csrf
                @method('PUT')

                {{-- 所属ジムID --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        所属ジムID
                    </label>
                    <input type="number"
                        name="gym_id"
                        value="{{ old('gym_id', $boxer->gym_id) }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3
                                  focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                </div>

                {{-- 戦績 --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-4">
                        戦績
                    </label>

                    <div class="grid grid-cols-3 gap-4">

                        <input type="number"
                            name="win"
                            min="0"
                            value="{{ old('win', $boxer->win) }}"
                            placeholder="勝ち"
                            class="bg-slate-800 border border-slate-700 rounded-lg p-3
                                      focus:outline-none focus:border-green-500">

                        <input type="number"
                            name="lose"
                            min="0"
                            value="{{ old('lose', $boxer->lose) }}"
                            placeholder="負け"
                            class="bg-slate-800 border border-slate-700 rounded-lg p-3
                                      focus:outline-none focus:border-red-500">

                        <input type="number"
                            name="draw"
                            min="0"
                            value="{{ old('draw', $boxer->draw) }}"
                            placeholder="引き分け"
                            class="bg-slate-800 border border-slate-700 rounded-lg p-3
                                      focus:outline-none focus:border-yellow-500">

                    </div>
                </div>

                {{-- タイトル --}}
                <div>
                    <label class="block text-red-500 text-3*1">
                        🏆 獲得タイトル
                    </label>
                    <input type="text"
                        name="titles"
                        value="{{ old('titles', $boxer->titles) }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3
                                  focus:outline-none focus:border-yellow-400 transition">
                </div>

                {{-- 自己紹介 --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        自己紹介
                    </label>
                    <textarea name="comment"
                        rows="4"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4
                                     focus:outline-none focus:border-red-500 transition resize-none">{{ old('comment', $boxer->comment) }}</textarea>
                </div>

                {{-- SNS --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        🌐 SNS URL
                    </label>
                    <input type="text"
                        name="sns_url"
                        value="{{ old('sns_url', $boxer->sns_url) }}"
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3
                                  focus:outline-none focus:border-blue-500 transition">
                </div>

                {{-- ボタン --}}
                <div class="flex justify-between items-center pt-6">

                    <a href="{{ route('boxers.show', $boxer) }}"
                        class="text-slate-400 hover:text-white text-sm transition">
                        ← 戻る
                    </a>

                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full
                                   font-semibold shadow-lg transition transform hover:scale-105">
                        保存する
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection