<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/home.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <h3 class="title">登録情報</h3>
    </header>
    <div class="user-info">
        <p>名前：{{ Auth::user()->name }}</p>
        <p>メールアドレス: {{ Auth::user()->email }}</p>
    </div>
</body>

</html>