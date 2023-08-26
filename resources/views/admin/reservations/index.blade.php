<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約一覧</title>
</head>

<body>
  @if (session('flash_message'))
    <div>
      {{ session('flash_message') }}
    </div>
  @endif
  <table>
    <thead>
      <tr>
        <th>映画作品</th>
        <th>座席</th>
        <th>日時</th>
        <th>名前</th>
        <th>メールアドレス</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($reservations as $reservation)
      <tr>
        <td>{{ $reservation->schedule->movie->title }}</td>
        <td>{{ $reservation->sheet->row }}-{{ $reservation->sheet->column }}</td>
        <td>{{ $reservation->date }}</td>
        <td>{{ $reservation->name }}</td>
        <td>{{ $reservation->email }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>

</html>
