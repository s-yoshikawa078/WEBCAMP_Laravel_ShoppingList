<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>買い物リスト（一覧画面）</title>
</head>
<body>
    <h1 class="uppercase">「買うもの」の登録</h1>

    {{-- 成功メッセージをフォームの上に表示 --}}
    @if(session('success'))
      <div style="color:black;">
        {{ session('success') }}
      </div>
    @endif


    {{-- 登録フォーム --}}
    <form method="POST" action="/shopping_list/register">
        @csrf
        <label for="name">「買うもの」名:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        <button type="submit">「買うもの」を登録する</button>
    </form>

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

<table border="1">
    <tr>
        <th>登録日</th>
        <th>「買うもの」名</th>
        <!-- 完了と削除の見出しを削除 -->
    </tr>
    @foreach($shopping_lists as $item)
    <tr>
        <td>{{ \Carbon\Carbon::parse($item->created_at)->tz('Asia/Tokyo')->format('Y/m/d') }}</td>
        <td>{{ $item->name }}</td>

        {{-- 完了ボタン（余白なし） --}}
        <td>
            <form action="/shopping_list/complete/{{ $item->id }}" method="POST">
                @csrf
                <button type="submit">完了</button>
            </form>
        </td>

        {{-- 削除ボタン --}}
        <td>
            <form action="/shopping_list/delete/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    {{-- ページネーション --}}
    現在 {{ $shopping_lists->currentPage() }} ページ目<br>

@if ($shopping_lists->onFirstPage() === false)
    <a href="{{ $shopping_lists->url(1) }}">最初のページ</a>
@else
    最初のページ
@endif
/

@if ($shopping_lists->previousPageUrl() !== null)
    <a href="{{ $shopping_lists->previousPageUrl() }}">前に戻る</a>
@else
    前に戻る
@endif
/

@if ($shopping_lists->nextPageUrl() !== null)
    <a href="{{ $shopping_lists->nextPageUrl() }}">次に進む</a>
@else
    次に進む
@endif

    <hr>
    <a href="/logout">ログアウト</a>
</body>
</html>