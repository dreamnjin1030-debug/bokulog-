<h1>{{ $boxer->user->name }}</h1>

<p>フォロワー数：{{ $boxer->followedUsers()->count() }}</p>

@if($boxer->isFollowedBy(auth()->user()))
<form action="{{ route('boxers.unfollow', $boxer) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">フォロー解除</button>
</form>
@else
<form action="{{ route('boxers.follow', $boxer) }}" method="POST">
    @csrf
    <button type="submit">フォローする</button>
</form>
@endif

<p>戦績：{{ $boxer->win }}勝 {{ $boxer->lose }}敗 {{ $boxer->draw }}分</p>

@if($boxer->titles)
<p>獲得タイトル：{{ $boxer->titles }}</p>
@endif

@if($boxer->comment)
<p>自己紹介：{{ $boxer->comment }}</p>
@endif

@if($boxer->sns_url)
<p>
    SNS:
    <a href="{{ $boxer->sns_url }}" target="_blank">{{ $boxer->sns_url }}</a>
</p>
@endif

<a href="{{ route('boxers.edit', $boxer) }}">プロフィール編集</a>
<hr>

<a href="{{ route('boxer_posts.index', $boxer) }}">
    このボクサーの投稿へ
</a>