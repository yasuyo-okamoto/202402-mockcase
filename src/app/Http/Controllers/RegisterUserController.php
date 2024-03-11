<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
  public function stamp()
  {
    return view('stamp');
  }

  public function register(Request $request)
  {
    $register = $request->only(['name', 'email', 'password']);
    return view('login');
  }


  public function attendance()
  {
    return view('attendance');
  }

}