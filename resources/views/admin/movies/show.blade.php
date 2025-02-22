<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画詳細</title>
</head>

<body>
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PATCh')
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div>
            <p>映画タイトル:{{ $movie->title }}</p>
        </div>
        <div>
            <img src="{{ $movie->image_url }}" alt="">
        </div>
        <div>
            <p>ジャンル:{{ $movie->genre ? $movie->genre->name : 'no genre' }}</p>
        </div>
        <div>
            <p>公開年:{{ $movie->published_year }}</p>
        </div>
        <div>
            <p>公開状況：{{ $movie->is_showing ? '上映中' : '上映予定' }}</p>
        </div>
        <div>
            <label for="description">概要</label>
            <textarea name="description" id="description" cols="30" rows="10" readonly>{{ $movie->description }}</textarea>
        </div>
        <div>
            <h1>スケジュール</h1>
            <a href="{{ route('admin.movies.schedules.create', $movie->id) }}">スケジュール追加</a>
            @if ($schedules->isEmpty())
                <p>スケジュールは設定されていないです。</p>
            @else
                @foreach ($schedules as $schedule)
                    <li><a
                            href="{{ route('admin.schedules.show', $schedule->id) }}">開始時刻；{{ $schedule->start_time }}　終了時刻：{{ $schedule->end_time }}</a>
                    </li>
                @endforeach
            @endif
        </div>
    </form>
</body>

</html>
