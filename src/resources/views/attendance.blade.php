@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div id="current__date">
  @foreach ($attendances as $attendance)
    <div>{{ $attendance->date }}</div>
  @endforeach
  {{ $attendances->links() }}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateElements = document.querySelectorAll('.event-date');

        dateElements.forEach(function(element) {
            element.addEventListener('click', function() {
                const selectedDate = this.textContent.trim();
                alert('Selected date: ' + selectedDate);
            });
        });
    });
  </script>
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
    @foreach($attendances as $attendance)
    <tr>
      <td>{{ $attendance->name }}</td>
      <td>{{ $attendance->workstart }}</td>
      <td>{{ $attendance->workend }}</td>
      <td>{{ $attendance->breakstart }} - {{ $attendance->breakend }}</td>
      <td>{{ $attendance->work_duration }}</td>
    </tr>
    @endforeach


  </table>
</div>
@if($attendances->total() > $attendances->perPage())
<nav class="page__navigation">
  <ul class="pagination">
    <li class="page-item {{ $attendances->onFirstPage() ? 'disabled' : '' }}">
      <a href="{{ $attendances->previousPageUrl() }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @for($i = 1; $i <= $attendances->lastPage(); $i++)
    <li class="page-item {{ $attendances->currentPage() == $i ? 'active' : '' }}">
      <a  href="{{ $attendances->url($i) }}">{{ $i }}</a>
    </li>
    @endfor
    <li class="page-item {{ $attendances->currentPage() == $attendances->lastPage() ? 'disabled' : '' }}">
      <a href="{{ $attendances->nextPageUrl() }}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
@endif
@endsection