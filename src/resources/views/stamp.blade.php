@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<h1 class="stamp__title">
  @if (Auth::check())
    <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
  @endif
</h1>
  <div class="form__window">
    <div class="form__content">
      <form class="form__content" action="{{ url('/work/start') }}" method="post">
        <button id="startWorkBtn" type="submit" name="start">勤務開始</button>
      </form>
    </div>
    <div class="form__content">
      <form class="form__content" action="{{ url('/work/end') }}" method="post">
        <button id="endWorkBtn" disabled type="submit" name="end">勤務終了</button>
      </form>
    </div>
    <div class="form__content">
      <form class="form__content" action="{{ url('/break/start') }}" method="post">
        <button id="startBreakBtn" disabled  type="submit" name="break__start">休憩開始</button>
      </form>
    </div>
    <div class="form__content">
      <form class="form__content" action="{{ url('/break/end') }}" method="post">
        <button id="endBreakBtn" disabled type="submit" name="break__end">休憩終了</button>
      </form>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var startWorkBtn = document.getElementById('startWorkBtn');
    var endWorkBtn = document.getElementById('endWorkBtn');
    var startBreakBtn = document.getElementById('startBreakBtn');
    var endBreakBtn = document.getElementById('endBreakBtn');

    startWorkBtn.addEventListener('click', function() {
        startWorkBtn.disabled = true;
        endWorkBtn.disabled = false;
        startBreakBtn.disabled = false;
    });

    endWorkBtn.addEventListener('click', function() {
        endWorkBtn.disabled = true;
        startWorkBtn.disabled = false;
        startBreakBtn.disabled = true;
        endBreakBtn.disabled = true;
    });

    startBreakBtn.addEventListener('click', function() {
        startBreakBtn.disabled = true;
        endBreakBtn.disabled = false;
        endWorkBtn.disabled = true;
    });

    endBreakBtn.addEventListener('click', function() {
        endBreakBtn.disabled = true;
        startBreakBtn.disabled = false;
        endWorkBtn.disabled = false;
    });
});
  </script>

@endsection