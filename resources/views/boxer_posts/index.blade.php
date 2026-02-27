<h1>{{ $boxer->user->name }}の投稿一覧</h1>

<a href="{{ route('boxer_posts.create', $boxer) }}">新規投稿</a>

@foreach($posts as $post)
<div>
    <p>{{ $post->comment }}</p>

    <a href="{{ route('boxer_posts.edit', $post) }}">編集</a>

    <form action="{{ route('boxer_posts.destroy', $post) }}" method="POST" style="display:inline"
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

    <p>いいね数：{{ $post->likedUsers->count() }}</p>

    @if($post->isLikedBy(auth()->user()))
    <form action="{{ route('boxer_posts.unlike', $post) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">いいね解除</button>
    </form>
    @else
    <form action="{{ route('boxer_posts.like', $post) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">いいね</button>
    </form>
    @endif
</div>

<div style="margin-left:20px;">
    @foreach($post->comments as $comment)
    <div>
        <storong>
            {{ $comment->user->name }}
            @if ($comment->user_id === $post->boxer->user_id)
            @endif
        </storong>
        :{{ $comment->comment }}

        {{-- 編集リンク --}}
        <a href="{{route('boxer_post_comments.edit', $comment) }}">編集</a>

        {{-- 削除フォーム --}}
        <form action="{{route('boxer_post_comments.destroy', $comment) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
        </form>
    </div>
    @endforeach
</div>
<form method="POST" action="{{ route('boxer_post_comments.store', $post) }}">
    @csrf
    <textarea name="comment" rows="3" style="width:100%;" placeholder="コメントを書く"></textarea>
    @error('comment')
    <div style="color:red;">{{$message}}</div>
    @enderror

    <button type="submit">コメントする</button>
</form>
@endforeach