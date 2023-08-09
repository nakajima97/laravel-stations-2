<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画登録</title>
</head>

<body>
    <form action="{{ route('admin.movies.store') }}" method="POST">
      @csrf
      <div>
        <label for="title">映画タイトル</label>
        <input type="text" name="title" id="title">
      </div>
      <div>
        <label for="image_url">画像URL</label>
        <input type="url" name="image_url" id="image_url">
      </div>
      <div>
        <label for="published_year">公開年</label>
        <input type="number" name="published_year" id="published_year">
      </div>
      <div>
        <label for="published_year_yes">公開中</label>
        <input type="radio" name="is_showing" id="published_year_yes" value="true">
        <label for="published_year_no">公開前</label>
        <input type="radio" name="is_showing" id="published_year_no" value="false">
      </div>
      <div>
        <label for="description">概要</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
      </div>
      <input type="submit" value="送信">
    </form>
</body>

</html>
