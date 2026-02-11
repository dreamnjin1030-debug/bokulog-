<h2>コメント</h2>

@foreach ($userPost->contents as $content)
<div class="comment">
    <strong>{{ $content->user->name }}</strong><br>
    {{ $content->content }}
</div>
@endforeach

@auth
<form action="{{ route('user-post-contents.store', $userPost->id) }}" method="POST">
    @csrf
    <textarea name="content" row="3" required></textarea>
    <button type="submit">コメントする</button>
</form>
@endauth