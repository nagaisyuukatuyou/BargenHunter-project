<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <title>カテゴリ一覧</title>
</head>
<body>
    <h1>カテゴリ</h1>
    <div class="grid">
    @foreach($categories as $category)
        <div class="item">
            <img src="{{ asset('images/' . $category->image) }}", width="100" height="100">
            <br>
            <a href="#">{{ $category->title }}</a>
            <p>{{ $category->sub_title }}</p>
        </div>
    @endforeach
  </div>
  
  <br>
</body>
</html>