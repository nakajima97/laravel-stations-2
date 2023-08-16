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
            <h2>{{ $movie->id }} {{ $movie->title }}</h2>
            <table>
                <thead>
                    <th>開始時刻</th>
                    <th>終了時刻</th>
                    <th>詳細</th>
                    <th>編集</th>
                </thead>
                <tbody>
                @foreach ($movie->schedules as $schedule)
                    <tr>
                      <td>{{ $schedule->start_time }}</td>
                      <td>{{ $schedule->end_time }}</td>
                      <td><a href="{{ route('admin.schedules.show', $schedule->id) }}">詳細画面へ</a></td>
                      <td><a href="{{ route('admin.schedules.edit', $schedule->id) }}">編集画面へ</a></td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        @endif
    @endforeach
</body>

</html>
