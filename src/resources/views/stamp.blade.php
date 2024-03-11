@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<h1 class="stamp__title">
  <input type="text" name="name"  />
</h1>
  <form class="form__content" action="stamp" method="post">
  <div class="form__window">
    <div class="form__content">
      <button class="stamp" type="submit" name="start">勤務開始</button>
    </div>
    <div class="form__content">
      <button class="stamp" type="submit" name="end">勤務終了</button>
    </div>
    <div class="form__content">
      <button class="stamp" type="submit" name="break__start">休憩開始</button>
    </div>
    <div class="form__content">
      <button class="stamp" type="submit" name="break__end">休憩終了</button>
    </div>
  </div>
  </form>
@endsection