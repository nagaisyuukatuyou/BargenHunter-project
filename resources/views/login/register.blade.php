<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/register.css" rel="stylesheet">
    <title>新規登録</title>
</head>

<body>
    <header>
        <div class="header-contents">
            <a href="{{ route('top_page') }}"><img src="{{ asset('images/アイコン/bargain_hunter_icon.jpg') }}"
                    alt="icon"></a>
            <div class="title">新規登録</div>
        </div>
    </header>
    <div class="create_user">
        <h1 class="title-b">新規登録</h1>
        @if ($errors->any())
        <div>
            <div>something went wrong!</div>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <div class="textarea">
                <div class="text-name">
                    <label for="name">名前　　　　　</label>
                    <input type="text" name="name" autofocus autocomplete="off">
                </div>
                <div class="text-email">
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" autocomplete="off">
                </div>
                <div class="text-password">
                    <label for="password">パスワード　　</label>
                    <input type="password" name="password">
                </div>
            </div>
            <div class="create_button">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>

</html>