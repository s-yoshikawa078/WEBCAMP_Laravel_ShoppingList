<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト　管理画面</title>
</head>
<body>
    <h1 style="text-transform: uppercase;">管理画面　ログイン</h1>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <div style="color:black;">{{ session('success') }}</div>
    @endif

    {{-- バリデーションエラー --}}
    @if($errors->any())
        <div style="color:black;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf
        <label for="login_id">ログインID:</label>
        <input type="text" name="login_id" id="login_id" value="{{ old('login_id') }}">
        <br>

        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password">
        <br>

        <button type="submit">ログインする</button>
    </form>
</body>
</html>
