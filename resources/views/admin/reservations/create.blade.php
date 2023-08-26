<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約作成</title>
</head>

<body>
  <form action="{{ route('admin.reservations.store') }}" method="POST">
    {{-- @csrf
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    <div>
      <label for="date">上映日</label>
      <input type="date" id="date" name="date">
    </div>
    <div>
      <label for="schedule_id">スケジュールID</label>
      <input type="number" id="schedule_id" name="schedule_id">
    </div>
    <div>
      <label for="sheet_id">シートID</label>
      <input type="number" id="sheet_id" name="sheet_id">
    </div>
    <div>
      <label for="email">メールアドレス</label>
      <input type="email" id="email" name="email">
    </div>
    <div>
      <label for="name">名前</label>
      <input type="text" id="name" name="name">
    </div>
    <button type="submit">予約する</button> --}}
    @csrf
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    <div>
      <label for="date">上映日</label>
      <input type="date" id="date" name="date">
    </div>
    <div>
      <label for="schedule_id">タイトル</label>
      <select name="schedule_id" id="schedule_id">
        <option value="" selected></option>
        @foreach ($schedules as $schedule)
          <option value="{{ $schedule->id }}" data-movie-id="{{ $schedule->movie->id }}">{{ $schedule->movie->title }} {{ $schedule->start_time }} ~ {{ $schedule->end_time }}の回</option>
        @endforeach
      </select>
      <input type="hidden" id="movie_id" name="movie_id">
    </div>
    <div>
      <label for="sheet_id">座席</label>
      <select name="sheet_id" id="sheet_id">
        <option value="" selected></option>
        @foreach ($sheets as $sheet)
          <option value="{{ $sheet->id }}">{{ $sheet->row }}-{{ $sheet->column }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="email">メールアドレス</label>
      <input type="email" id="email" name="email">
    </div>
    <div>
      <label for="name">名前</label>
      <input type="text" id="name" name="name">
    </div>
    <button type="submit">予約する</button>
  </form>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const scheduleSelect = document.getElementById("schedule_id");
        const movieIdInput = document.getElementById("movie_id");
  
        scheduleSelect.addEventListener("change", function () {
            const selectedOption = scheduleSelect.options[scheduleSelect.selectedIndex];
            const selectedMovieId = selectedOption.getAttribute("data-movie-id");
            movieIdInput.value = selectedMovieId;
        });
    });
  </script>
</body>

</html>
