<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;


class RegisterUserController extends Controller
{
  //打刻画面表示
  public function index()
  {
    return view('stamp');
  }

  //会員登録
  //public function store(RegisterRequest $request)
    //{
      //if ($request->has('back')) {
            //return redirect('/')->withInput();
        //}
      //$registeruser = RegisterUser::create(
        //$request->only([
          //'name',
          //'email',
          //'password' => bcrypt($request->password),
          //])
      //);
        //return view('/login');
    //}

  //ログイン
  //public function authenticate(RegisterRequest $request)
//{
   // $credentials = $request->only('email', 'password');

    //if (Auth::attempt($credentials)) {
        // 認証成功時の処理
       // return redirect()->intended('/');
   // }
    // 認証失敗時の処理
    //return back()->withErrors([
        //'email' => 'The provided credentials do not match our records.',
    //]);

    //}





    //勤務時間表示画面編集いる
 // public function search(Request $request)
  //  {
    //    $query = Contact::query();
      //  $query = $this->getSearchQuery($request, $query);

        //$contacts = $query->paginate(5);
        //$categories = Category::all();
        //return view('attendance', compact('contacts', 'categories'));
    //}



}