<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト</title>
</head>
<body>
<h1>ユーザ登録</h1>

@if (session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div style="color:black;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('front.user.register.post') }}">
    @csrf
    <label for="name">名前:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">
    <br>

    <label for="email">email:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}">
    <br>

    <label for="password">パスワード:</label>
    <input type="password" name="password" id="password">
    <br>

    <label for="password_confirmation">パスワード(再度):</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
    <br>

    <button type="submit">登録する</button>
</form>
</body>
</html>
