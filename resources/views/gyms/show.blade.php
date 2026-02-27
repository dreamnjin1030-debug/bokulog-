<h1>{{ $gym->name }}</h1>

<p>住所：{{ $gym->address }}</p>

<h2>所属ボクサー</h2>

@forelse($gym->boxers as $boxer)
<p>
    <a href="{{ route('boxers.show', $boxer) }}">
        {{ $boxer->user->name }}
    </a>
</p>
@empty
<p>所属ボクサーはいません</p>
@endforelse

<h2>地図</h2>

<iframe
    width="100%"
    height="300"
    style="border:0"
    loading="lazy"
    allowfullscreen
    src="http://www.google.com/maps?q={{ urlencode($gym->address) }}&output=embed">
</iframe>