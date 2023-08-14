<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>映画一覧</title>
</head>
<body>
  <form action="{{ route('movies.index') }}" method="GET">
    @csrf
    <input type="text" name="keyword">
    <fieldset>
      <input type="radio" name="is_showing" id="is_showing_all" value="" checked>
      <label for="is_showing_all">すべて</label>
      <input type="radio" name="is_showing" id="is_showing_yes" value="1">
      <label for="is_showing_yes">公開中</label>
      <input type="radio" name="is_showing" id="is_showing_no" value="0">
      <label for="is_showing_no">公開予定</label>
    </fieldset>
    <input type="submit" value="検索">
    </form>
  <ul>
    @foreach ($movies as $movie)
      <li>id：{{ $movie->id }}</li>
      <li>is_showing：{{ $movie->is_showing }}</li>
      <li>タイトル：{{ $movie->title }}</li>
      <li>画像URL：{{ $movie->image_url }}</li>
    @endforeach
  </ul>
  {{ $movies->appends(request()->query())->links() }}
</body>
</html>