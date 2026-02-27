<form method="POST" action="{{ route('boxers.store') }}">
    @csrf

    <div>
        <label for="gym_id">所属ジムid</label><br>
        <input type="number" name="gym_id" placeholder="gym_id">
    </div>

    <div>
        <label for="win">勝ち</label><br>
        <input type="number" name="win" min="0" step="1" placeholder="勝ち">
    </div>

    <div>
        <label for="lose">負け</label><br>
        <input type="number" name="lose" min="0" step="1" placeholder="負け">
    </div>

    <div>
        <label for="draw">引き分け</label><br>
        <input type="number" name="draw" min="0" step="1" placeholder="引き分け">
    </div>

    <div>
        <label for="titles">獲得タイトル</label><br>
        <input type="text" name="titles" placeholder="獲得タイトル">
    </div>

    <div>
        <label for="comment">自己紹介</label><br>
        <textarea name="comment" placeholder="自己紹介"></textarea>
    </div>

    <div>
        <label for="sns_url">SNS URL</label><br>
        <input type="text" name="sns_url" placeholder="SNS URL">
    </div>

    <button type="submit">保存</button>
</form>