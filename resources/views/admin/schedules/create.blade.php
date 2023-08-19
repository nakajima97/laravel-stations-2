<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール作成</title>
</head>

<body>
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif
    <form action="{{ route('admin.movies.schedules.store', $id) }}" method="POST">
        @csrf
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <input type="hidden" name="movie_id" value="{{ $id }}">
        <div>
            <label for="start_time_date">開始日付</label>
            <input type="date" name="start_time_date" id="start_time_date" value="{{ old('start_time_date') }}">
        </div>
        <div>
            <label for="start_time_time">開始時間</label>
            <input type="time" name="start_time_time" id="start_time_time" value="{{ old('start_time_time') }}">
        </div>
        <div>
            <label for="end_time_date">終了日付</label>
            <input type="date" name="end_time_date" id="end_time_date" value="{{ old('end_time_date') }}">
        </div>
        <div>
            <label for="end_time_time">終了時間</label>
            <input type="time" name="end_time_time" id="end_time_time" value="{{ old('end_time_time') }}">
        </div>
        <input type="submit" value="作成">
    </form>
</body>

</html>
