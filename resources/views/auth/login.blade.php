<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト</title>
</head>
<body>
    <h1>ログイン</h1>

    <!-- 登録成功・ログイン失敗メッセージ -->
    @if (session('success'))
        <div style="color:black;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color:black;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <br>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">ログインする</button>
    </form>
    <span><a href="/user/register">会員登録</a></span>
</body>