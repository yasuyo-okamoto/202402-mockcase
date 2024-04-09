@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="date__page">
        @if($worklogs->total() > 0)
            <a href="{{ route('attendance', ['date' => \Carbon\Carbon::parse($worklogs[0]->date)->subDay()->format('Y-m-d')]) }}">&lt;</a>

        @if($worklogs->total() > 0)
            <span>{{ $worklogs[0]->date }}</span>
        @endif

            <a href="{{ route('attendance', ['date' => \Carbon\Carbon::parse($worklogs[count($worklogs) - 1]->date)->addDay()->format('Y-m-d')]) }}">&gt;</a>
        @endif
</div>

<div class="attendance__table">
  <table class="attendance__table--content">
    <tr>
      <th>名前</th>
      <th>勤務開始</th>
      <th>勤務終了</th>
      <th>休憩時間</th>
      <th>勤務時間</th>
    </tr>
    <!-- 勤務情報を表示 -->
    @foreach($worklogs as $worklog)
    <tr>
      <td>{{ $worklog->user->name }}</td>
      <td>{{ $worklog->workstart }}</td>
      <td>{{ $worklog->workend }}</td>
      <!--<td>{{ gmdate('H:i:s', $worklog->breakstart) }}</td>-->
      <td>{{ gmdate('H:i:s', $worklog->total_break_time) }}</td>
      <td>{{ gmdate('H:i:s', $worklog->total_work_time - $worklog->total_break_time) }}</td>
    </tr>
    @endforeach
  </table>
</div>

<div class="pagination-container">
    {{ $worklogs->links('vendor.pagination.costom') }}
</div>

@endsection
