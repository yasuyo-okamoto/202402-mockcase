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



}