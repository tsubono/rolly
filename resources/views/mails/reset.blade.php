<h3>
    <a href="{{ config('app.url') }}">時計レンタル（ROLLY）</a>
</h3>
<p>
    下記リンクをクリックしてパスワードをリセットしてください。
</p>
<p>
    {{ $actionText }}: <a href="{{ $actionUrl }}?email={{ $email }}">{{ $actionUrl }}?email={{ $email }}</a>
</p>