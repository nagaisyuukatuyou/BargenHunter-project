<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/categories02.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>カテゴリ一覧</title>
</head>
<body>
<header>
  <a href="{{ route('top_page') }}" style="margin-right: 300px;"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}" alt="icon"></a>
    <form style="display: inline;" action="{{ route('categories') }}" method="GET">
      <input type="text" placeholder="検索" name="keyword">
      <button>検索</button>
    </form>
    <a href="{{ route('home') }}" class="user-name" style="text-decoration: none;">
      @if(Auth::check())
      <span class="hid">
        {{ Str::limit(Auth::user()->name, '6', '...') }}
      @endif
        <img class="user-profile" src="{{ asset('images/アイコン/login.jpg') }}" alt="logo">
      </span>
    </a>
      <!-- <a href="{{ route('home') }}"><img class="user-profile" src="{{ asset('images/アイコン/login.jpg') }}" alt="logo"></a> -->
  </header>
  @if($keyword)
    <p>検索ワード：<span style="color: blue;">{{ $keyword }}　　</span><a href="{{ route('categories') }}">カテゴリ一覧へ戻る</a></p>
  @endif
  <div class="categories">
    @forelse($categories as $category)
      <div class="category">
        <a href="{{ route('products', ['category_id' => $category->id]) }}">
          <img src="{{ asset('images/' . $category->image) }}", width="100" height="100">
          <h2>{{ $category->title }}</h2>
          <p>{{ $category->sub_title }}</p>
        </a>
      </div>
      @empty
      <p>検索ワード「<span style="color: blue;">{{ $keyword }}</span>」にヒットする結果はありません。</p>
    @endforelse
  </div>
  <footer>
    <p>以上より商品のカテゴリーを選択してください。</p>
  </footer>
</body>
</html>