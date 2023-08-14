<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール一覧</title>
</head>

<body>
  @foreach ($movies as $movie)
    @if (!$movie->schedules->isEmpty())
        <h2>{{ $movie->id }} {{$movie->title}}</h2>
        <ul>
        @foreach ($movie->schedules as $schedule)
          <li>開始時刻；{{ $schedule->start_time }}　終了時刻：{{ $schedule->end_time }}</li>
        @endforeach
      </ul>
    @endif
  @endforeach
</body>

</html>
