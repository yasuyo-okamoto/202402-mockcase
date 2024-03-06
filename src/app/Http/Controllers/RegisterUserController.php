<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
  public function stamp()
  {
    return view('stamp');
  }

  public function register(Request $request)
  {
    $register = $request->only(['name']);
    return $register;
    return $view('stamp', compact('register'));
  }

  public function login()
  {
    return view('login');
  }

  public function attendance()
  {
    return view('attendance');
  }

}