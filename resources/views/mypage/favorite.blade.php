<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/favorite.css" rel="stylesheet">
    <title>お気に入り一覧</title>
</head>

<body>
    <header>
        <h3>お気に入り一覧</h3>
    </header>
    @foreach($results as $result)
    <div class="shop-list">
        <div class="name">スーパー名：{{ $result->s_name }}</div>
        <div class="address">所在地：{{ $result->address }}</div>
        <div class="open-time">開店時間：{{ $result->open_time }}</div>
        <div class="close-time">開店時間：{{ $result->close_time }}</div>
        <div class="tel">電話番号：{{ $result->phone_number }}</div>
        <br>
        <form action="{{ route('favoriteDelete') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="supermarket_id" value="{{ $result->id }}">
            <button type="submit">削除</button>
        </form>
    </div>
    @endforeach


</body>

</html>