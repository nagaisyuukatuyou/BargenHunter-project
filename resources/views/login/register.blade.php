<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
</head>
<body>
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
    <h3>新規登録</h3>
<form method="POST" action="{{ route('store') }}">
    @csrf
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" autofocus>
    </div>
    <div>
        <label for="email">メールアドレス</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="text" name="password">
    </div>
    <div>
        <button type="submit">登録</button>
    </div>
</form>
</body>
</html>