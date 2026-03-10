@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">

    {{-- タイトル --}}
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-extrabold tracking-wide text-white">
            🥊 観客の投稿一覧
        </h1>

        <a href="{{ route('user_posts.create') }}"
            class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full font-semibold shadow-lg transition duration-300">
            + 新規投稿
        </a>
    </div>

    @foreach ($posts as $post)
    <div class="bg-slate-900 rounded-2xl p-6 mb-8 shadow-xl border border-slate-800 hover:border-red-500 transition duration-300">

        {{-- タイトル --}}
        <h2 class="text-2xl font-bold mb-3 text-red-400">
            {{ $post->title }}
        </h2>

        {{-- コメント --}}
        <p class="text-slate-300 leading-relaxed mb-5">
            {{ $post->comment }}
        </p>

        {{-- 評価 --}}
        <div class="flex items-center mb-3">
            <span class="mr-2 font-semibold text-slate-400">評価:</span>
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <=$post->rating)
                <span class="text-yellow-400 text-lg">★</span>
                @else
                <span class="text-slate-600 text-lg">★</span>
                @endif
                @endfor
        </div>

        {{-- ボクサー --}}
        <p class="text-sm text-slate-500 mb-4">
            対象ボクサー: {{ $post->boxer->user->name }}
        </p>

        {{-- アクションボタン --}}
        <div class="flex items-center flex-wrap gap-3 mb-4">

            <a href="{{ route('user_posts.edit',$post) }}"
                class="bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded-lg text-sm font-semibold transition">
                編集
            </a>

            <form action="{{ route('user_posts.delete', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('削除しますか？')"
                    class="bg-slate-700 hover:bg-slate-600 px-4 py-1 rounded-lg text-sm">
                    削除
                </button>
            </form>

            <a href="{{ route('user_posts.show', $post->id) }}"
                class="text-sm text-red-400 hover:underline">
                💬 コメント ({{ $post->user_post_comments_count }}件)
            </a>
        </div>

        {{-- いいね機能 --}}
        @auth
        @php
        $liked = $post->likedUsers->contains(auth()->id());
        @endphp

        <div class="flex items-center gap-4 mb-3">

            @if($liked)
            <form action="{{ route('user_posts.unlike', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="flex items-center gap-1 text-red-500 hover:text-red-400 transition">
                    ❤️ いいね解除
                </button>
            </form>
            @else
            <form action="{{ route('user_posts.like', $post->id) }}" method="POST">
                @csrf
                <button class="flex items-center gap-1 text-slate-400 hover:text-red-500 transition">
                    🤍 いいね
                </button>
            </form>
            @endif

            <div class="text-xs text-slate-400 mt-2">
                <a href="#"
                    class="show-likes text-blue-400"
                    data-post-id="{{ $post->id }}">
                    {{ $post->likedUsers->count() }} いいね
                </a>
            </div>

        </div>
        {{-- いいねユーザー表示モーダル --}}
        <div id="likesModel" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="bg-white p-4 rounded w-80">
                <h2 class="font-bold mb-2">いいねしたユーザー</h2>
                <ul id="likesUserList"></ul>

                <button onclick="closeLikesModel()" class="mt-3 text-sm text-gray-500">
                    閉じる
                </button>
            </div>
        </div>

    </div>
    @endauth

    @endforeach
    <script>
        document.querySelectorAll('.show-likes').forEach(el => {
            el.addEventListener('click', function(e) {

                e.preventDefault();

                const postId = this.dataset.postId;

                fetch(`/user-posts/${postId}/likes`)
                    .then(res => res.json())
                    .then(users => {

                        const list = document.getElementById('likesUserList');
                        list.innerHTML = '';

                        users.forEach(user => {
                            const li = document.createElement('li');
                            li.textContent = user.name;
                            list.appendChild(li);
                        });

                        document.getElementById('likesModel').classList.remove('hidden');

                    });
            });
        });

        function closeLikesModel() {
            document.getElementById('likesModel').classList.add('hidden');
        }
    </script>

</div>

@endsection