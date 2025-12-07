<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト（一覧画面）</title>
</head>
<body>
    <h1 class="uppercase">「買うもの」の登録</h1>

    {{-- 登録フォーム --}}
    <form method="POST" action="/shopping_list/register">
        @csrf
        <label for="name">「買うもの」名:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        <button type="submit">「買うもの」を登録する</button>
    </form>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    {{-- バリデーションエラー --}}
    @if($errors->any())
        <div style="color:black;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <hr>

    <h1 class="uppercase">「買うもの」一覧</h1>
    <a href="/completed_shopping_list/list">購入済み「買うもの」一覧</a>

    {{-- テーブル --}}
    <table border="1">
        <tr>
            <th>登録日</th>
            <th>「買うもの」名</th>
        </tr>
        @foreach($shopping_lists as $item)
        <tr>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->name }}</td>
        </tr>
        @endforeach
    </table>

    {{-- ページネーション --}}
    <div class="pagination">
        現在 {{ $shopping_lists->currentPage() }} ページ目<br>
        <a href="{{ $shopping_lists->url(1) }}">最初のページ</a>
        <a href="{{ $shopping_lists->previousPageUrl() ?? '#' }}">前に戻る</a>
        <a href="{{ $shopping_lists->nextPageUrl() ?? '#' }}">次に進む</a>
    </div>

    <hr>
    <a href="/logout">ログアウト</a>
</body>
</html>