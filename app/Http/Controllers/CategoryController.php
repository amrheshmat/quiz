<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    public function showCategory(){
         $cat = Category::all();
         $arr = Array('cat' => $cat);
         return view('home',$arr);
    }
}
