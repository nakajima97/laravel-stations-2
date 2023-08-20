<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約</title>
</head>

<body>
    <form action="{{ route('reservations.store') }}" method="POST">
      @csrf
      <input type="hidden" name="movie_id" value="{{ $movie_id }}">
      <input type="hidden" name="schedule_id" value="{{ $schedule_id }}">
      <input type="hidden" name="sheet_id" value="{{ $sheet_id }}">

      <div>
        <label for="date">日付</label>
        <input id="date" type="text" name="date" value="{{ $date }}" readonly>
      </div>

      <div>
        <label for="name">予約者メールアドレス</label>
        <input type="text" name="email" value="{{ old('email') }}">
      </div>

      <div>
        <label for="name">予約者氏名</label>
        <input type="text" name="name" value="{{ old('name') }}">
      </div>

      <input type="submit" value="予約">
    </form>
</body>

</html>
