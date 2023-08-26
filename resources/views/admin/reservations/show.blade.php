<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約作成</title>
</head>

<body>
  <p>上映日：{{ $reservation->date }}</p>
  <p>タイトル：{{ $reservation->schedule->movie->title}}</p>
  <p>座席：{{ $reservation->sheet->row }}-{{ $reservation->sheet->column }}</p>
  <p>メールアドレス：{{ $reservation->email }}</p>
  <p>名前：{{ $reservation->name }}</p>
</body>

</html>
