<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約作成</title>
</head>

<body>
    @csrf
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    <div>
      <label for="date">上映日</label>
      <input type="date" id="date" name="date" value="{{ $reservation->date }}">
    </div>
    <div>
      <label for="schedule_id">スケジュールID</label>
      <input type="number" id="schedule_id" name="schedule_id" value="{{ $reservation->schedule_id }}">
    </div>
    <div>
      <label for="sheet_id">座席</label>
      <select name="sheet_id" id="sheet_id">
        @foreach ($sheets as $sheet)
          <option value="{{ $sheet->id }}">{{ $sheet->row }}-{{ $sheet->column }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="email">メールアドレス</label>
      <input type="email" id="email" name="email" value="{{ $reservation->email }}">
    </div>
    <div>
      <label for="name">名前</label>
      <input type="text" id="name" name="name" value="{{ $reservation->name }}">
    </div>
    <button type="submit">予約する</button>
  </form>
</body>

</html>
