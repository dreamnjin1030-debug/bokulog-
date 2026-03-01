@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-10 tracking-wide">
            🥊 ボクサー新規登録
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-10 shadow-2xl">

            <form method="POST" action="{{ route('boxers.store') }}" class="space-y-6">
                @csrf

                {{-- 所属ジム --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        所属ジムID
                    </label>
                    <input type="number" name="gym_id"
                        class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                        placeholder="gym_id"
                        value="{{ old('gym_id') }}">
                </div>

                {{-- 戦績 --}}
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm text-slate-400 mb-2">勝ち</label>
                        <input type="number" name="win" min="0"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500"
                            value="{{ old('win') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-slate-400 mb-2">負け</label>
                        <input type="number" name="lose" min="0"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500"
                            value="{{ old('lose') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-slate-400 mb-2">引き分け</label>
                        <input type="number" name="draw" min="0"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500"
                            value="{{ old('draw') }}">
                    </div>
                </div>

                {{-- タイトル --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        獲得タイトル
                    </label>
                    <input type="text" name="titles"
                        class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-400"
                        value="{{ old('titles') }}"
                        placeholder="例）日本フェザー級王者">
                </div>

                {{-- 自己紹介 --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        自己紹介
                    </label>
                    <textarea name="comment" rows="4"
                        class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500"
                        placeholder="戦歴や目標など...">{{ old('comment') }}</textarea>
                </div>

                {{-- SNS --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        SNS URL
                    </label>
                    <input type="text" name="sns_url"
                        class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500"
                        value="{{ old('sns_url') }}"
                        placeholder="https://...">
                </div>

                {{-- 送信ボタン --}}
                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-black font-bold py-4 rounded-xl transition transform hover:scale-105 shadow-lg">
                        保存する
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection