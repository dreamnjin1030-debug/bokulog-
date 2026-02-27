{{-- 投稿の詳細 --}}
<div style="margin-bottom: 24px; padding:16px; border: 1px  solid #ddd; border-radius : 8px;">
    <h2>{{ $userPost->title }}</h2>

    <p style="margin-top:8px;">
        {{ $userPost->comment }}
    </p>

    <div style="color: #666; font-size: 12px; margin-top: 8px;">
        評価：
        @for ($i = 1; $i <= 10; $i++)
            @if ($i <=$userPost->rating)
            ★
            @else
            ☆
            @endif
            @endfor
            <br>
            作成日：{{ $userPost->created_at }}
    </div>
</div>

<h3>コメント</h3>

@foreach ($userPost->userPostComments as $comment)
<div style="margin-bottom:16px;">
</div>
<p>
    <strong>{{ $comment->user->name }}</strong>
    <br>{{ $comment->comment }}<br>
    <small>{{ $comment->created_at }}</small>
</p>

<!--　編集ボタン -->
<a href="{{ route('user_post_comments.edit', $comment->id) }}">
    編集
</a>

<!-- 削除ボタン -->
<form action="{{ route('user_post_comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('本当に削除しますか')">
        削除
    </button>
</form>
@endforeach

@auth
<form action="{{ route('user_post_comments.store', $userPost->id) }}" method="POST">
    @csrf

    <div>
        <textarea name="comment" placeholder="コメントを書く" required></textarea>
    </div>
    <button type="submit">コメントする</button>
</form>

<a href="{{ route('user_posts.index') }}">投稿一覧に戻る</a>
@endauth