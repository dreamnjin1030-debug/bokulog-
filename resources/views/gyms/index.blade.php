<h1>ジム一覧</h1>

@foreach($gyms as $gym)
<p>
    <a href="{{ route('gyms.show', $gym) }}">
        {{ $gym->name }}
    </a>
</p>
@endforeach