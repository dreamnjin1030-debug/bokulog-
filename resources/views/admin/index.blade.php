@extends('layouts.app')

@section('content')

<div class="text-white p-6">

@foreach($applications as $app)

<div class="mb-4 border-b border-gray-600 pb-2">

ユーザー：{{ $app->user->name }}

<br>

ステータス：{{ $app->status }}

<br>

<a class="text-blue-400 underline"
href="{{ route('admin.boxer.show',$app->id) }}">
詳細
</a>

</div>

@endforeach

</div>

@endsection