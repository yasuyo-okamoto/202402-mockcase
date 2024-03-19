<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;



class RegisteredUserController extends Controller
{
  public function store(Request $request)
    {
        // 会員登録処理

        // 登録後のリダイレクト
        return redirect()->route('login')->with('success', '会員登録が完了しました。ログインしてください。');
    }
}
