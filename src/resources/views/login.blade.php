@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<h1 class="login__title">ログイン</h1>
  <div class="form__window">
    <form class="form__content" action="/login" method="post">
      @csrf
      <div class="form__group">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
      </div>
      <div class="form__group">
        <input type="password" name="password" placeholder="パスワード">
      </div>
      <div class="form__button">
        <button class="form__button--content" type="submit">ログイン</button>
      </div>
    </form>
  </div>
  <div class="member__registration">
    <p class="submit__text">アカウントをお持ちでない方はこちらから</p>
    <a class="register__link" href="/register">会員登録</a>
  </div>
@endsection
