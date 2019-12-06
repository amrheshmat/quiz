<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizeInfo;

class QuizInfoController extends Controller
{
        
    public function showQuizes(){
             $quizes = QuizeInfo::all();
             $arr = Array('quizes' => $quizes);
             return view('home',$arr);
        }

}
