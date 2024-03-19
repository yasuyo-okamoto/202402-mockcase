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