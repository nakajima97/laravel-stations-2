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
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      <table>
        <thead>
          <th colspan="5">スクリーン</th>
        </thead>
        <tbody>
          @foreach ($sheet_map as $key => $sheets)
            <tr>
              @foreach ($sheets as $sheet)
                <td>{{ $key }}-{{ $sheet }}</td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
    </form>
</body>

</html>
