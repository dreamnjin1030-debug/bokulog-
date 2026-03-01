@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-white py-16">
    <div class="max-w-xl mx-auto px-6">

        {{-- タイトル --}}
        <h1 class="text-2xl font-bold mb-8 tracking-wide">
            ✏️ コメント編集
        </h1>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl">

            <form method="POST"
                action="{{ route('boxer_post_comments.update', $comment) }}"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- テキストエリア --}}
                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        コメント内容
                    </label>

                    <textarea name="comment"
                        rows="5"
                        class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-4 text-slate-200 focus:outline-none focus:ring-2 focus:ring-green-500 transition resize-none">{{ old('comment', $comment->comment) }}</textarea>

                    @error('comment')
                    <div class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- ボタン --}}
                <div class="flex justify-between items-center pt-4">

                    <a href="{{ url()->previous() }}"
                        class="text-slate-400 hover:text-white transition">
                        ← 戻る
                    </a>

                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-black font-bold px-6 py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                        更新する
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
@endsection