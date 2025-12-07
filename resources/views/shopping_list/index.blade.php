<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト一覧</title>
</head>
<body>
    <h1>「買うもの」一覧</h1>

    {{-- 登録成功メッセージ --}}
    @if(session('success'))
        <div style="color:black;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <tr>
            <th>登録日</th>
            <th>「買うもの」名</th>
        </tr>
        @foreach($shopping_lists as $item)
        <tr>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y/m/d') }}</td>
            <td>{{ $item->name }}</td>
        </tr>
        @endforeach
    </table>

    {{-- ページネーション --}}
    {{ $shopping_lists->links() }}
</body>
</html>