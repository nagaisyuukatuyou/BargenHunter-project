<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>{{ $category->title }}</title>
</head>
<body>
  <header>
  <div class="line" style="display: flex;  justify-content: center; align-items: center;">
  <a href="{{ route('top_page') }}"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}" alt="icon"></a>
    <p class="font" style="margin: 0 510px 0 510px;">{{ $category->title }}</p>
        <a href="{{ route('home') }}" class="user-name" style="text-decoration: none;">
        @if(Auth::check())
        <span class="hid">{{ Str::limit(Auth::user()->name, '10', '...') }}</span>
        @endif
        <img class="user-profile" src="{{ asset('images/アイコン/login.jpg') }}" alt="logo">
    </a>
  </div>
  </header>

    <div style="background-color: beige;">
        <br>
        <div class="back">
            <a class="color" href="{{ route('categories') }}">カテゴリ</a>
            <span class="color">　>　</span>
            <span class="result" href="{{ route('products', ['category_id' => $category->id]) }}">{{ $category->title }}</span>
        </div>
        <hr style="margin: 10px 0 0 0;">
    </div>
    <div class="grid-seika">
    @foreach($products as $product)
        <div class="item-seika">
            <img src="{{ asset('images/' . $category->title . '/' . $product->image) }}", width="100", height="100">
            <br>
            <a href="{{ route('prices', ['category_id' => $category->id, 'product_id' => $product->id]) }}">{{ $product->product_name }}</a>
        </div>
    @endforeach
    </div>
</body>
</html>