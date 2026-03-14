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
                <div class="mb-6">
                    <label class="block  text-slate-400 mb-2">
                        所属ジムID
                    </label>

                    <input type="text" id="gym-search"
                        placeholder="ジムを検索..."
                        class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 text-white">
                    
                    <input type="hidden" name="gym_id" id="gym_id">

                    <ul id="gym-list"
                        class="bg-slate-900 border border-slate-700 rounded-lg mt-2 max-h-40 overflow-y-auto hidden">

                        @foreach($gyms as $gym)
                            <li class="p-2 hover:bg-red-500 cursor-pointer"
                                data-name="{{ strtolower($gym->name) }}"
                                onclick="selectGym({{ $gym->id }}, '{{ $gym->name }}')">

                                {{ $gym->name }}
                            </li>
                        @endforeach

                    </ul>

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

    <script>

        document.addEventListener("DOMContentLoaded", function(){

        const search = document.getElementById("gym-search");
        const list = document.getElementById("gym-list");
        const items = document.querySelectorAll("#gym-list li");

        search.addEventListener("focus", function(){
            list.classList.remove("hidden");
        });

        search.addEventListener("input", function(){

            let keyword = this.value.toLowerCase();

            items.forEach(function(item){

                let name = item.dataset.name;

                if(name.includes(keyword)){
                    item.style.display = "block";
                }else{
                    item.style.display = "none";
                }       

            });

        });

        window.selectGym = function(id, name){

            document.getElementById("gym-search").value = name;
            document.getElementById("gym_id").value = id;

            list.classList.add("hidden");

        }

        document.addEventListener("click", function(e){

            if(!search.contains(e.target) && !list.contains(e.target)){
                list.classList.add("hidden");
            }

        });

    });

</script>
</div>
@endsection