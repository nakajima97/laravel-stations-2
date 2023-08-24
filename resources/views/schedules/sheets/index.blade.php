<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画登録</title>
</head>

<body>
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif
    <table>
        <thead>
            <th colspan="5">スクリーン</th>
        </thead>
        <tbody>
            @foreach ($sheets as $sheet)
                <tr>
                    @foreach ($sheet as $s)
                        @if ($s->reservations->isEmpty())
                            <td class="bg-gray-400">
                                <a
                                    href="{{ route('movies.schedules.reservations.create', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'sheetId' => $s['id'], 'date' => $date]) }}">{{ $s->row }}-{{ $s->column }}</a>
                            </td>
                        @else
                            <td>
                                {{ $s->row }}-{{ $s->column }}
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
