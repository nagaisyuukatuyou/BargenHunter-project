<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/toppage.css') }}">
    <title>トップページ</title>
</head>

<body>
    <div class="container">
        <div class="meat-image">
            <img src="{{ asset('images/アイコン/toppage.jpg') }}" alt="">
        </div>
        <div class="buttons">
            @if( Auth::check() )
            <h3>ようこそ、{{ Auth::user()->name }}さん</h3>
            @endif
            <a class="button start" href="{{ route('categories') }}" style="text-decoration: none;">
                <div>スタート</div>
            </a>
            <a class="button signin" href="{{ route('showLogin') }}" style="text-decoration: none;">
                <div>サインイン</div>
            </a>
        </div>
    </div>
    
    <div class="buttons">
    @if(Auth::check())
    <p>ログイン中のユーザー：{{ Str::limit(Auth::user()->name, 6, '...') }}</p>
    @endif
      <a class="button start" href="{{ route('categories') }}" style="text-decoration: none;"><div>スタート</div></a>
      <a class="button signin" href="{{ route('showLogin') }}" style="text-decoration: none;"><div>サインイン</div></a>
    </div>
  </div>

</body>

</html>