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
        <input type="text" name="title" id="title" value="{{ $movie->title }}">
      </div>
      <div>
        <label for="image_url">画像URL</label>
        <input type="url" name="image_url" id="image_url" value="{{ $movie->image_url }}">
      </div>
      <div>
        <label for="genre">ジャンル</label>
        <input type="text" name="genre" id="genre" value="{{ $movie->genre !== null ? $movie->genre->name : 'ジャンル無し' }}">
      </div>
      <div>
        <label for="published_year">公開年</label>
        <input type="number" name="published_year" id="published_year" value="{{ $movie->published_year }}">
      </div>
      <div>
        <input type="radio" name="is_showing" id="is_showing_yes" value="1" @if($movie->is_showing === 1) checked @endif>
        <label for="is_showing_yes">公開中</label>
        <input type="radio" name="is_showing" id="is_showing_no" value="0" @if($movie->is_showing === 0) checked @endif>
        <label for="is_showing_no">公開前</label>
      </div>
      <div>
        <label for="description">概要</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ $movie->description }}</textarea>
      </div>
      <input type="submit" value="更新">
    </form>
</body>

</html>
