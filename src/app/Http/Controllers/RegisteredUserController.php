<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // メール認証を送信
        $user->sendEmailVerificationNotification();

        // ログイン画面にリダイレクト
        return redirect()->route('login')->with('success', '会員登録が完了しました。メールを確認してアカウントを有効化してください。');
    }
}


