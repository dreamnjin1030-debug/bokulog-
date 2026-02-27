<form method="POST" action="{{ route('boxers.update', $boxer) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="gym_id">所属ジムid</label><br>
        <input type="number" name="gym_id" value="{{ old('gym_id', $boxer->gym_id) }}">
    </div>

    <div>
        <label for="win">勝ち</label><br>
        <input type="number" name="win" min="0" step="1" value="{{ old('win', $boxer->win) }}">
    </div>

    <div>
        <label for="lose">負け</label><br>
        <input type="number" name="lose" min="0" step="1" value="{{ old('lose', $boxer->lose) }}">
    </div>

    <div>
        <label for="draw">引き分け</label><br>
        <input type="number" name="draw" min="0" step="1" value="{{ old('draw', $boxer->draw) }}">
    </div>

    <div>
        <label for="titles">獲得タイトル</label><br>
        <input type="text" name="titles" value="{{ old('titles', $boxer->titles) }}">
    </div>

    <div>
        <label for="comment">自己紹介</label><br>
        <textarea name="comment">{{ old('comment', $boxer->comment) }}"</textarea>
    </div>

    <div>
        <label for="sns_url">SNS URL</label><br>
        <input type="text" name="sns_url" value="{{ old('sns_url', $boxer->sns_url) }}">
    </div>

    <button type="submit">保存</button>
</form>