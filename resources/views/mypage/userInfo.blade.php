<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>名前：{{ Auth::user()->name }}</li>
        <li>メールアドレス: {{ Auth::user()->email }}</li>
    </ul>
</body>
</html>