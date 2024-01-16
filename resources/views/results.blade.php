<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>画面のレイアウト</title>
    <link rel="stylesheet" href="{{ asset('css/results.css') }}">
</head>

<body>
    <div class="header">
        <div class="search-bar">
            <input type="text" placeholder="検索">
            <button><img src="https://i.imgur.com/6Z4d5Jj.png" alt="マイク"></button>
        </div>
        <div class="user-profile">
            <a href="{{ route('home') }}"><img src="https://i.imgur.com/7b3Yw2K.png" alt="ユーザー"></a>
        </div>
    </div>
    <div class="result-message">
        <h2>{{ $count }}件のスーパーがヒットしました。</h2>
    </div>
    <hr>
    <br>
    <div class="ice-cream-photo">
        <img src="{{ asset('images/' . $category->title . '/' . $img->image) }}" width="300" height="300">
    </div>
    <div class="shop-list">
        @foreach($results as $result)
        <div class="shop-list-item">
            <div class="shop-list-item-info">
                <div class="shop-list-item-name">スーパー名：{{ $result->s_name }}</div>
                <div class="shop-list-item-price">価格：{{ $result->price }}円</div>
                <div class="shop-list-item-address">所在地：{{ $result->address }}</div>
                <div class="shop-list-item-hours">開店時間：{{ $result->open_time }}</div>
                <div class="shop-list-item-hours">開店時間：{{ $result->close_time }}</div>
                <div class="shop-list-item-address">電話番号：{{ $result->phone_number }}</div>
                <br>





                <form action="{{ route('insert') }}" method="POST" onsubmit="return confirm_favorite()">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="supermarket_id" value="{{ $result->id }}">
                    <button type="submit">お気に入りに登録</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>

<script>
function confirm_favorite
var select = confirm("お気に入り登録しますか        
    return sele ct;

}
</script>