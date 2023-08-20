<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画登録</title>
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
                        <td><a
                                href="{{ route('movies.schedules.reservations.create', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'sheetId' => $sheet['id'], 'date' => $date]) }}">{{ $key }}-{{ $sheet['column'] }}</a>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
