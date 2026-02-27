<h1>投稿編集</h1>

<form action="{{ route('user_posts.update', $userPost) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>タイトル</label>
        <input type="text" name="title" value="{{ old('title', $userPost->title) }}">
    </div>

    <div>
        <label>本文</label>
        <textarea name="comment">{{ old('comment', $userPost->comment) }}</textarea>
    </div>

    <div>
        <label>評価</label>
        <select name="rating">
            @for ($i = 1; $i <=10; $i++)
                <option value="{{ $i  }}" {{ old('rating', $userPost->rating) == $i ? 'selected' : '' }}>
                {{ $i  }}
                </option>
                @endfor
        </select>
    </div>

    <button type="submit">更新する</button>

</form>