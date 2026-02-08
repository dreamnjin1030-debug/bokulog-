<h1>新規投稿</h1>

<form action="{{ route('user_posts.store') }}" method="POST">
    @csrf

    <div>
        <label>ボクサーID</label>
        <input type="number" name="boxer_id">
    </div>

    <div>
        <label>タイトル</label>
        <input type="text" name="title" value="{{old('title') }}">
    </div>

    <div>
        <label>本文</label>
        <textarea name="content">{{ old('body') }}</textarea>
    </div>

    <div>
        <label>評価（1~5）</label>
        <input type="number" name="rating" min="1" max="5">
    </div>

    <button type="submit">投稿する</button>
</form>