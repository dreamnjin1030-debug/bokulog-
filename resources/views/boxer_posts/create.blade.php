<h1>{{ $boxer->user->name }}の新規投稿作成画面</h1>

<form method="POST" action="{{ route('boxer_posts.store', $boxer) }}">
    @csrf

    <div class="mb-3">
        <label for="comment" class="form-label">投稿内容</label>
        <textarea name="comment"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        投稿する
    </button>
</form>

<hr>

<a href="{{ route('boxer_posts.index', $boxer) }}">
    投稿一覧に戻る
</a>