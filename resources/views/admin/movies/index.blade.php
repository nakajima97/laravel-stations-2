<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画一覧</title>
</head>

<body>
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>ジャンル</th>
                <th>公開年</th>
                <th>上映中かどうか</th>
                <th>概要</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->image_url }}</td>
                    <td>{{ $movie->genre !== null ? $movie->genre->name : 'ジャンル無し' }}</td>
                    <td>{{ $movie->published_year }}</td>
                    <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                    <td>{{ $movie->description }}</td>
                    <td><a href="{{ route('admin.movies.edit', ['id' => $movie->id]) }}">編集</a></td>
                    <td>
                        <form method="post" action="{{ route('admin.movies.destroy', $movie->id) }}" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button class="delete-button" onclick="return confirmDelete();">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete() {
            return confirm('本当に削除しますか？');
        }
    </script>
</body>

</html>
