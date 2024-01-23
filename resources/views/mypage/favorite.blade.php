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
        <div class="header-contents">
            <a href="{{ route('top_page') }}"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}"
                    alt="icon"></a>
            <div class="title">お気に入り一覧</div>
        </div>
    </header>

    @if (!empty($results))
    @foreach($results as $result)
    <div class="shop-list">
        <div class="name">
            <h2 class="shop-name">{{ $result->s_name }}</h3>
        </div>
        <img src="{{ asset('images/店画像/'. '/' . $result->s_image) }}" width="300" height="300">
        <div class="name">スーパー名：{{ $result->s_name }}</div>
        <div class="address">所在地：{{ $result->address }}</div>
        <div class="address">最寄り駅：{{ $result->nearest_station }}</div>
        <div class="open-time">開店時間：{{ $result->open_time }}</div>
        <div class="close-time">開店時間：{{ $result->close_time }}</div>
        <div class="tel">電話番号：{{ $result->phone_number }}</div>
        <div class="address">ウェブサイト：<a href="{{ $result->web_site }}" class="btn" target="_blank">こちら</a></div>
        <br>
        <form action="{{ route('favoriteDelete') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="supermarket_id" value="{{ $result->id }}">
            <button type="submit">削除</button>
        </form>
    </div>
    @endforeach
    @else
    <div class="shop-list">お気に入り登録されているお店はありません。</div>
    @endif
    <div class="back">
        <a href="{{ $url }}"><button class="back-button">戻る</button></a>
    </div>



</body>

</html>