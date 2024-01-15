<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入り一覧</title>
</head>

<body>
    @foreach($results as $result)
    <div class="shop-list-">
        <div class="name">スーパー名：{{ $result->s_name }}</div>
        <div class="address">所在地：{{ $result->address }}</div>
        <div class="open-time">開店時間：{{ $result->open_time }}</div>
        <div class="close-time">開店時間：{{ $result->close_time }}</div>
        <div class="tel">電話番号：{{ $result->phone_number }}</div>
        <br>
    </div>
    @endforeach


</body>

</html>