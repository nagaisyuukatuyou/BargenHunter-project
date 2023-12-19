<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <title></title>
</head>
<body>
    <div class="grid">
    @foreach($products as $product)
        <div class="item">
            <p>{{ $product->product_name }}</p>
        </div>
    @endforeach
    </div>
</body>
</html>