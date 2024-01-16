<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <title>{{ $category->title }}</title>
</head>
<body>
    <h1>{{ $category->title }}</h1>
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