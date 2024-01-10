<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body>
<main class="form-signin w-100 m-auto">
  <form  method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">ログイン</h1>

    @foreach ($errors->all() as $error)
    <ul class="alert alert-danger">
      <li>{{$error}}</li>
    </ul>
    @endforeach
    @if (session("login_success"))
      <div cass="alert alert-success">
        {{ session('login_success')}}
    </div>
      @endif

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">ログイン</button>
  </form>
  <button onclick="location.href='{{ route('register') }}'">新規登録</button>
</main>
 
</body>
</html>