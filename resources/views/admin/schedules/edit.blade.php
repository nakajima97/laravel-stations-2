<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール一覧</title>
</head>

<body>
  <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="id" value="{{ $schedule->movid_id }}">
    <div>
      <label for="start_time_date">開始日付</label>
      <input type="date" name="start_time_date" id="start_time_date" value="{{ $schedule->start_time->format('Y-m-d') }}">
    </div>
    <div>
      <label for="start_time_time">開始時間</label>
      <input type="time" name="start_time_time" id="start_time_time" value="{{ $schedule->start_time->format('H:i') }}">
    </div>
    <div>
      <label for="end_time_date">終了日付</label>
      <input type="date" name="end_time_date" id="end_time_date" value="{{ $schedule->end_time->format('Y-m-d') }}">
    </div>
    <div>
      <label for="end_time_time">終了時間</label>
      <input type="time" name="end_time_time" id="end_time_time" value="{{ $schedule->end_time->format('H:i') }}">
    </div>
    <input type="submit" value="更新">
  </form>
</body>

</html>
