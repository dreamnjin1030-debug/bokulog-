@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10">

<div class="bg-slate-800 text-white p-6 rounded-lg shadow-lg">

<h2 class="text-2xl font-bold mb-4">
{{ $application->user->name }}
</h2>

<img
class="rounded mb-4"
src="{{ asset('storage/'.$application->license_image) }}"
width="300">

<p class="mb-6">
ステータス :
<span class="text-yellow-400 font-bold">
{{ $application->status }}
</span>
</p>

<div class="flex gap-4">

<form action="{{ route('admin.boxer.approve',$application->id) }}" method="POST">
@csrf
<button
class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">
承認
</button>
</form>

<form action="{{ route('admin.boxer.reject',$application->id) }}" method="POST">
@csrf
<button
class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
拒否
</button>
</form>

</div>

</div>

</div>

@endsection
