<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト（購入済み「買うもの」一覧）</title>
</head>
<body>
    <h1 class="uppercase">購入済み「買うもの」一覧</h1>

    {{-- 「買うもの」一覧に戻るリンク --}}
    <a href="/shopping_list/list">「買うもの」一覧に戻る</a>

    <table border="1">
        <tr>
            <th>「買うもの」名</th>
            <th>購入日</th>
        </tr>
        @foreach($completed_lists as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->tz('Asia/Tokyo')->format('Y/m/d') }}</td>
        </tr>
        @endforeach
    </table>

    {{-- ページネーション --}}
    現在 {{ $completed_lists->currentPage() }} ページ目<br>

    @if ($completed_lists->onFirstPage() === false)
        <a href="{{ $completed_lists->url(1) }}">最初のページ</a>
    @else
        最初のページ
    @endif
    /

    @if ($completed_lists->previousPageUrl() !== null)
        <a href="{{ $completed_lists->previousPageUrl() }}">前に戻る</a>
    @else
        前に戻る
    @endif
    /

    @if ($completed_lists->nextPageUrl() !== null)
        <a href="{{ $completed_lists->nextPageUrl() }}">次に進む</a>
    @else
        次に進む
    @endif

    <hr>
    <a href="/logout">ログアウト</a>
</body>
</html>