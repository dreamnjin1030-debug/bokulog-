<h1>ボクサー一覧</h1>

<ul>
    @foreach ($boxers as $boxer)
    <li>
        <a href="{{ route('boxers.show', $boxer) }}">
            {{ $boxer->user->name }}
        </a>
        ({{ $boxer->win }}勝 {{ $boxer->lose }}敗 {{ $boxer->draw }}分)
    </li>
    @endforeach
</ul>

<hr>

<div style="color: red; font-size: 24px;">
    <a href=" {{ route('boxers.create') }}">新規ボクサー作成画面</a>
</div>