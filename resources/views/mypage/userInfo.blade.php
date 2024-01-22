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
        <div class="header-contents">
            <a href="{{ route('top_page') }}"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}"
                    alt="icon"></a>
            <div class="title">登録情報</div>
        </div>
    </header>
    <div class="user-info">
        <p>名前：{{ Auth::user()->name }}</p>
        <p>メールアドレス: {{ Auth::user()->email }}</p>
    </div>
    <div class="back">
        <a href="{{ route('home') }}"><button class="back-button">戻る</button></a>
    </div>

</body>

</html>