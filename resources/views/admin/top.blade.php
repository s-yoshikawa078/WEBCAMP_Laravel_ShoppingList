<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト　管理画面</title>
</head>
<body>

    <!-- ナビゲーション -->
    <nav>
        <a href="{{ route('admin.top') }}">管理画面Top</a><br>
        <a href="{{ route('admin.user.list') }}">ユーザ一覧</a><br>
        <a href="{{ route('admin.logout') }}">ログアウト</a><br>
    </nav>

    <!-- 中身 -->
    <h1>管理画面</h1>

</body>
</html>