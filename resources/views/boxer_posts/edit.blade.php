<form method="POST" action="{{ route('boxer_posts.update', $post) }}">
    @csrf
    @method('PUT')

    <textarea name="comment">{{ old('comment', $post->comment) }}</textarea>

    <button type="submit">更新</button>
</form>