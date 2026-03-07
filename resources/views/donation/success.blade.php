@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">

    <div class="bg-slate-800 shadow-xl rounded-2xl p-10 text-center w-full max-w-md">

        <div class="text-green-400 text-6x1 mb-4">
            ✓
        </div>

        <h1 class=" text-white text-3x1 font-bold mb-4">
            決済成功
        </h1>

        <p class="text-gray-300 mb-8">
            投げ銭ありがとうございます！
        </p>

        <a href="{{ route('boxers.show', $boxer->id) }}"
            class="inline-block  bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg transition">

            選手ページへ戻る

        </a>

    </div>

</div>
@endsection