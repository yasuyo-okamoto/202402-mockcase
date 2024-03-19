<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function registered(Request $request, $user)
  {
    Session::flash('success', '会員登録が完了しました。ログインしてください。');
    return Redirect::route('auth.login');
  }
}
