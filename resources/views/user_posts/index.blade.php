<body style="margin:0; background:#0f172a;">
    <div stayle="max-width; 800px; margin: 0 auto; padding: 40px 20px; background: #0f172a; min-height: 100vh;">
        <h1 style="
        font-size:50;
        color:#ffffff;
        ">観客の投稿一覧</h1>

        <a href=" {{ route('user_posts.create') }}"
            style="
        font-size:35;
        color:yellow;
        ">新規作成</a>

        @if (session(' success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif

        @foreach ($posts as $post)
        <div style="
    background:#ffffff;
    border-radius:14px;
    padding:24px;
    margin-bottom: 24px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    border: 1px solid rgba(0,0,0,0.05);
    ">
            <h2 style="
            font-size: 22px; 
            font-weight: 700; 
            margin-bottom: 12px; 
            color:#0f172a;
            ">
                {{ $post->title }}
            </h2>

            <p style="
        color:#334155;
        line-height: 1.7; 
        margin-bottom: 16px;
        ">
                {{ $post->content }}
            </p>

            <p style="margin-bottom: 8px; color:#475569; font-weight: 600;">
                評価:
                @for ( $i = 1; $i <= 5; $i++)
                    @if ($i <=$post->rating)
                    <span style="color:gold; font-size: 20px;">★</span>
                    @else
                    <span style="color:#ccc; font-size: 20px;">★</span>
                    @endif
                    @endfor
            </p>
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
        </div>
        @endforeach

    </div>
    </div>