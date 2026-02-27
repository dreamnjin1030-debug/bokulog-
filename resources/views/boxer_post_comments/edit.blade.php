<h1>コメント編集</h1>

<form method="POST" action="{{route('boxer_post_comments.update',$comment) }}">
    @csrf
    @method('PUT')

    <textarea name="comment" rows="5" style="width:100%;">{{ old('comment', $comment->comment) }}</textarea>

    @error('comment')
    <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">更新</button>
</form>