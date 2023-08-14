<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画登録</title>
</head>

<body>
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
      @csrf
      @method('PATCh')
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      <div>
        <label for="title">映画タイトル</label>
        <p>映画タイトル:{{ $movie->title }}</p>
      </div>
      <div>
        <img src="{{ $movie->image_url }}" alt="">
      </div>
      <div>
        <p>ジャンル:{{ $movie->genre->name }}</p>
      </div>
      <div>
        <p>公開年:{{ $movie->published_year }}</p>
      </div>
      <div>
        <p>公開状況：{{ $movie->is_showing ? "公開中" : "公開予定" }}</p>
      </div>
      <div>
        <label for="description">概要</label>
        <textarea name="description" id="description" cols="30" rows="10" readonly>{{ $movie->description }}</textarea>
      </div>
    </form>
</body>

</html>
