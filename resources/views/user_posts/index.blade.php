<body style="margin:0; background:#0f172a;">
    <div stayle="max-width; 800px; margin: 0 auto; padding: 40px 20px; background: #0f172a; min-height: 100vh;">
        <img src="{{ asset('bokulog-logo.png') }}" alt="bokulog" style="position: fixed; top: 16px; right: 16px; width: 250px; height: auto; z-index: 9999;">
        <h1 style="
        font-size:50;
        color:#ffffff;
        ">観客の投稿一覧</h1>

        <a href=" {{ route('user_posts.create') }}"
            style="
        font-size:35;
        color:yellow;
        ">新規作成</a>

        @foreach ($posts as $post)
        {{-- 投稿本体 --}}
        <div style="
            background:#ffffff;
            border-radius:14px;
            padding:24px;
            margin-bottom: 24px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
            border: 1px solid rgba(0,0,0,0.05);">

            <h2 href="
            font-size: 22px; 
            font-weight: 700; 
            margin-bottom: 12px; 
            color:#0f172a;
            text-decoration: none;">
                {{ $post->title }}
            </h2>

            <p style="
            color:#334155;
            line-height: 1.7; 
            margin-bottom: 16px;">
                {{ $post->comment }}
            </p>

            {{-- 評価, ボクサーid, 編集, 削除, --}}
            <p style="margin-bottom: 8px; color:#475569; font-weight: 600;">
                評価:
                @for ( $i = 1; $i <= 10; $i++)
                    @if ($i <=$post->rating)
                    <span style="color:gold; font-size: 20px;">★</span>
                    @else
                    <span style="color:#ccc; font-size: 20px;">★</span>
                    @endif
                    @endfor
            </p>

            <p style="color:#64748b; font-size: 14px; margin-bottom: 16px;">
                ボクサーID : {{ $post->boxer_id }}
            </p>

            <a href="{{ route('user_posts.edit',$post) }}"
                style="
             display: inline-block;
             padding: 8px 14px;
             border-radius: 8px;
             background:#2563ed;
             color:#ffffff;
             text-decoration: none;
             font-weight: 600;
             margin-right: 8px;
            ">
                編集
            </a>

            <form action="{{ route('user_posts.delete', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick=" return confirm('削除しますか？')">
                    削除
                </button>
            </form>

            <p class="text-sm text->gray-600">
                <a href="{{ route('user_posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                    コメント詳細 (コメント {{ $post->user_post_comments_count }} 件)
                </a>
            </p>

            @auth
            @php
            $liked = $post->likedUsers->contains(auth()->id());
            @endphp

            @if($liked)
            <form action="{{ route('user_posts.unlike', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">いいね解除</button>
            </form>
            @else
            <form action="{{ route('user_posts.like', $post->id) }}" method="POST">
                @csrf
                <button type="submit">いいね</button>
            </form>
            @endif
            @endauth

            <p>いいね数：{{ $post->likedUsers->count() }}</p>
            <p>いいねした人:</p>
            <ul>
                @foreach($post->likedUsers as $user)
                <li>{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        @endforeach
    </div>


</body>