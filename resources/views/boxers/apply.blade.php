@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto mt-16 px-6">
    @if(session('success'))
        <div class="mb-6 bg-green-500 text-white p-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="bg-slate-900 border border-slate-700 rounded-xl p-8 shadow-lg">

        <h1 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
            🥊 プロボクサー申請
        </h1>


        <p class="text-gray-400 mb-6">
            プロボクサーとして登録するにはライセンスナンバーとライセンス画像を提出してください。
        </p>

        <form action="{{ route('boxer.apply.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
        <label class="block text-gray-300 mb-2">ライセンス番号</label>

        <input
            type="text" name="license_number"class="w-full p-3 rounded-lg bg-slate-800 border border-slate-600 text-gray-200"/>

            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2">
                    プロライセンス画像
                </label>

                <input
                    type="file"
                    name="license_image"
                    class="block w-full text-sm text-gray-300
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-red-500 file:text-white
                    hover:file:bg-red-600
                    bg-slate-800 border border-slate-600 rounded-lg
                    cursor-pointer"
                >
            </div>

            <div class="pt-4">
                <button
                    type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 rounded-lg transition"
                >
                    申請する
                </button>
            </div>

        </form>

    </div>

</div>

@endsection