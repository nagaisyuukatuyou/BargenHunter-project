<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>結果一覧</title>
    <link rel="stylesheet" href="{{ asset('css/results.css') }}">
</head>

<body>

  <header>
  <a href="{{ route('top_page') }}" style="margin-right: 120px;"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}" alt="icon"></a>
    <form style="display: inline;" action="{{ route('prices', ['category_id' => $category->id, 'product_id' => $product->product_id]) }}" method="GET">
      <input type="text" placeholder="検索" name="keyword">
      <button>検索</button>
    </form>
    <a style="margin-left: 120px" href="{{ route('home') }}"><img class="user-profile" src="{{ asset('images/アイコン/login.jpg') }}" alt="logo"></a>
  </header>

  <div class="result-message">
    <h2>{{ $count }}件のスーパーがヒットしました。</h2>
  </div>
  <div class="back">
  <a class="color" href="{{ route('categories') }}">カテゴリ</a>
    <span class="color">　>　</span>
  <a class="color" href="{{ route('products', ['category_id' => $category->id]) }}">{{ $category->title }}</a>
    <span class="color">　>　</span>
    <span class="result">{{ $img_name->product_name }}</span>
  </div>
   <hr>
  <br>
  <div style="margin: auto auto; width: 1050px;"><!--追加-->
  <div class="ice-cream-photo">
    <img src="{{ asset('images/' . $category->title . '/' . $img_name->image) }}" width="300" height="300">
    <h2>{{ $img_name->product_name }}の最安値：{{ $minresult->price }}円</h2>
    <img src="{{ asset('images/店画像/'. '/' . $minresult->s_image) }}" width="100" height="100">
      <div class="shop-list-item-info">
        <div class="shop-list-item-name">スーパー名：{{ $minresult->s_name }}</div>
        <div class="shop-list-item-price">価格：{{ $minresult->price }}円</div>
        <div class="shop-list-item-address">所在地：{{ $minresult->address }}</div>
        <div class="shop-list-item-hours">開店時間：{{ $minresult->open_time }}</div>
        <div class="shop-list-item-hours">閉店時間：{{ $minresult->close_time }}</div>
        <div class="shop-list-item-address">電話番号：{{ $minresult->phone_number }}</div>
        <div class="shop-list-item-address">ウェブサイト：<a href="{{ $minresult->web_site }}" class="btn" target="_blank">こちら</a></div>
        <br>
    </div>
     <form action="{{ route('insert') }}" method="POST" onsubmit="return confirm_favorite()">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="supermarket_id" value="{{ $minresult->id }}">
        <button class="many" type="submit">お気に入り</button>
     </form>
  </div>
  <div class="shop-list">
    @if($keyword)
    <button style="width: 80px; font-size: 70%; background-color: pink; border-radius: 10px;" onclick="location.href='{{ route('prices', ['category_id' => $category->id, 'product_id' => $product->product_id]) }}'">結果一覧へ</button>
      <p>検索ワード：<span class="keyword">{{ $keyword }}</span></p>
    @endif
  @forelse($results as $result)
    <div class="shop-list-item">
      <img src="{{ asset('images/店画像/'. '/' . $result->s_image) }}" width="100" height="100">
      <div class="shop-list-item-info">
        <div class="shop-list-item-name">スーパー名：{{ $result->s_name }}</div>
        <div class="shop-list-item-price">価格：{{ $result->price }}円</div>
        <div class="shop-list-item-address">所在地：{{ $result->address }}</div>
        <div class="shop-list-item-hours">開店時間：{{ $result->open_time }}</div>
        <div class="shop-list-item-hours">閉店時間：{{ $result->close_time }}</div>
        <div class="shop-list-item-address">電話番号：{{ $result->phone_number }}</div>
        <div class="shop-list-item-address">ウェブサイト：<a href="{{ $result->web_site }}" class="btn" target="_blank">こちら</a></div>
        <br>
    </div>
      <form action="{{ route('insert') }}" method="POST" onsubmit="return confirm_favorite()">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="supermarket_id" value="{{ $result->id }}">
        <button type="submit">お気に入り</button>
      </form>
    </div>
    @empty
    <p style="color: red;">別の検索ワードを試してみてください。</p>
    @endforelse
  </div>
</body>
</html>

<script>
function confirm_favorite() {
    var select = confirm("お気に入り登録しますか？");
    return select;
}
</script>