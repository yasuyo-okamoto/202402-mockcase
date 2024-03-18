@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<h1 class="register__title">会員登録</h1>
  <div class="form__window">
  <form class="form__content" action="/register" method="post">
    @csrf
    @error('name')
          <div class="error">{{ $message }}</div>
    @enderror
    @error('email')
          <div class="error">{{ $message }}</div>
    @enderror
    @error('password')
          <div class="error">{{ $message }}</div>
    @enderror
    @error('password')
          <div class="error">{{ $message }}</div>
    @enderror
    <div class="form__group">
      <input type="text" name="name" id="name" placeholder="名前">
    </div>
    <div class="form__group">
      <input type="email" name="email" id="email" placeholder="メールアドレス">
    </div>
    <div class="form__group">
      <input type="password" name="password" id="password" placeholder="パスワード">
    </div>
    <div class="form__group">
      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="確認用パスワード">
    </div>
    <div class="form__button">
      <button class="form__button--content" type="submit">会員登録</button>
    </div>
    <div class="login__pages">
      <p class="login__pages--text">アカウントをお持ちの方はこちらから</p>
      <a class="login__link" href="/login">ログイン</a>
    </div>
  </form>
  </div>
@endsection