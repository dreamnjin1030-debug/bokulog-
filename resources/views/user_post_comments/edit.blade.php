<h1>コメント編集</h1>

<form action="{{ route('user_post_comments.update', $comment) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>コメント</label>
        <textarea name="comment" required>{{ old('comment', $comment->comment) }}</textarea>
    </div>

    <div>
        <button type="submit">更新</button>
    </div>
</form>