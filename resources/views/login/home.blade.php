<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
</head>
<body>
    <div class="container">
        @if (session('login_success'))
            <div class="alert alert-success">
                {{ session('login_success') }}
            </div>     
        @endif
        <h3>プロフィール</h3>
        <ul>
            <li>名前：{{ Auth::user()->name }}</li>
            <li>メールアドレス: {{ Auth::user()->email }}</li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button>ログアウト</button>
        </form>
    </div>
</body>
</html>