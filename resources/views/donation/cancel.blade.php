@extends('layouts.app')

@section('content')

<div class="text-center mt-20">

    <h1 class="text-4x1 font-bold text-red-500">
        決済キャンセル
    </h1>

    <a href="{{ route('boxers.show', $boxer->id) }}"
        class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded">

        戻る

    </a>

</div>