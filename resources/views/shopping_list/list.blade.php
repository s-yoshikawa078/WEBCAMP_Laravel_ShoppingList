@extends('layout')

@section('title', '買うものリスト')

@section('contents')
<h1>買うものの登録</h1>

{{-- 成功メッセージをフォームの上に表示 --}}
@if(session('success'))
<div style="color:black;">
    {{ session('success') }}
</div>
@endif

{{-- バリデーションエラー --}}
@if ($errors->any())
<div style="color:black;">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
@endif

<form action="/shopping_list/register" method="post">
    @csrf
    買うもの名: <input type="text" name="name" value="{{ old('name') }}"><br>
    <button type="submit">登録する</button>
</form>

<hr>

<h1>買うもの一覧</h1>
<a href="/completed_shopping_list/list">購入済み「買うもの」一覧</a>


<table border="1">
    <tr>
        <th>登録日</th>
        <th>買うもの名</th>
        <th>完了</th>
        <th>削除</th>
    </tr>
    @foreach($shopping_lists as $item)
    <tr>
        {{-- 日付のみ表示 --}}
        <td>{{ $item->created_at->tz('Asia/Tokyo')->format('Y/m/d') }}</td>
        <td>{{ $item->name }}</td>
        
        {{-- 完了ボタン --}}
        <td>
            <form action="/shopping_list/complete/{{ $item->id }}" method="post">
                @csrf
                <button>完了</button>
            </form>
        </td>

        {{-- 削除ボタン --}}
        <td>
            <form action="/shopping_list/delete/{{ $item->id }}" method="post">
                @csrf
                @method('DELETE')
                <button>削除</button>
            </form>
        </td>
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
@endsection