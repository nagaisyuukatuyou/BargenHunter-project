<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <title>{{ $category->title }}</title>
</head>
<body class="body">

  <header>
  <a href="{{ route('top_page') }}"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}" alt="icon"></a>
    <p class="font">{{ $category->title }}</p>
    <a href="{{ route('home') }}"><img class="user-profile" src="{{ asset('images/アイコン/login.jpg') }}" alt="logo"></a>
  </header>

    <br>
    <div class="back">
        <a class="color" href="{{ route('categories') }}">カテゴリ</a>
        <span class="color">　>　</span>
        <span class="result" href="{{ route('products', ['category_id' => $category->id]) }}">{{ $category->title }}</span>
    </div>
    <hr style="margin: 10px 0 0 0;">
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