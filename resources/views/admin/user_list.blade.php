<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト　管理画面（ユーザ一覧画面）</title>
</head>
<body>
<nav>
    <a href="{{ route('admin.top') }}">管理画面Top</a><br>
    <a href="{{ route('admin.user.list') }}">ユーザ一覧</a><br>
    <a href="{{ route('admin.logout') }}">ログアウト</a><br>
</nav>

<h1>ユーザ一覧</h1>

<table border="1">
    <tr>
        <th>ユーザID</th>
        <th>ユーザ名</th>
        <th>購入した「買うもの」の数</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->completed_shopping_lists_count }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>