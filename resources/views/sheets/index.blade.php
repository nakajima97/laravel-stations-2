<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>映画一覧</title>
</head>
<body>
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
  </table>
  
</body>
</html>