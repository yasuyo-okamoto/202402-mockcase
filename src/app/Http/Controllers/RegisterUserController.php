<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
  public function stamp()
  {
    return view('stamp');
  }

  public function register()
  {
    return view('register');
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