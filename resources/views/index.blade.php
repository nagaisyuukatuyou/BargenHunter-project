<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/categories02.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>カテゴリ一覧</title>
</head>
<body>
  <header>
    <a href="{{ route('home') }}"><img src="https://i.imgur.com/5zQvzJj.png" alt="logo"></a>
    <input type="text" placeholder="検索">
    <button>検索</button>
  </header>
  <h1>カテゴリ</h1>
  <div class="categories">
    @foreach($categories as $category)
      <div class="category">
        <a href="{{ route('products', ['category_id' => $category->id]) }}">
          <img src="{{ asset('images/' . $category->image) }}", width="100" height="100">
          <h2>{{ $category->title }}</h2>
          <p>{{ $category->sub_title }}</p>
        </a>
      </div>
    @endforeach
  </div>
</body>
</html>