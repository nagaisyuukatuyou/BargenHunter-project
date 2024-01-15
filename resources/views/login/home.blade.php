<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
    <link href="/css/home.css" rel="stylesheet">
</head>

<body>
    <header>
        <h3 class="title">マイページ</h3>
    </header>
    <div class="container">
        @if (session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
        @endif
        <h3>ようこそ、{{ Auth::user()->name }}さん</h3>
        <!--<ul>
            <li>名前：{{ Auth::user()->name }}</li>
            <li>メールアドレス: {{ Auth::user()->email }}</li>
        </ul>-->
        <div class="select">
            <a href="{{ route('userInfo') }}"><button>登録情報</button></a>
            <a href="{{ route('favoriteView') }}"><button>お気に入りのお店</button></a>
            <a href="{{ route('categories') }}"><button>トップページ</button></a>
        </div>
        <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <button>ログアウト</button>
        </form>
    </div>
</body>

</html>