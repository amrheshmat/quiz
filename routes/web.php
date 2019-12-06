<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Category;
use App\Quiz;
use App\Questions;
use App\User;

Route::get('/', function () {
    return view('auth.login');
    });
    

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['web','auth']],function(){
    
    Route::get('/home',function(){
       if(Auth::user()->admin == 0){
             $cat = Category::all();
            $arr = Array('cat' => $cat);
            return view('home',$arr);
        }else{
                $users['users'] = \App\User::all();
                return view('adminhome',$users);
            }
    });
   
});




//category routes ...
Route::get('/category','CategoryController@showCategory');
Route::get('/cat/{cat_name}/{cat_id}',function($cat_name1,$cat_id){
    $cat = Category::all();
    $cat1 = Category::where('id',$cat_id)->get();
    $quiz1 = Quiz::where('cat_id',$cat_id)->get();
    return view('cat',
               ['quiz1' => $quiz1,'cat' => $cat1]
               );
});


//user information 
Route::get('/userprofile/{user_id}',function($user_id){
    $user = User::where('id',$user_id)->get();
    return view('userprofile',
               ['users' => $user]
               );
});


Route::get('/adminhome/{user_id}',function($user_id){
    $user = User::where('id',$user_id)->get();
    return view('adminhome',
               ['users' => $user]
               );
});

//quiz routes ....

Route::get('/quiz/{quiz_name}/{quiz_id}',function($quiz_name1,$quiz_id){
    $question = Questions::where('quiz_id',$quiz_id)->get();
    return view('quiz',
               ['question' => $question,'id' => $quiz_id,'name' => $quiz_name1,]
               );
});


//result routes ...

 Route::post('/result1/{quiz_name}/{quiz_id}',function($quiz_name,$quiz_id,Request $request){
           // ->get();

      $question = Questions::where('quiz_id',$quiz_id)->get();
      $users = count($question);
     
     //calculate result ...
     $resultCount = 0;
     // $newQuize = new Quiz();
     for($i = 1; $i <= $users ; $i++){
         foreach($question as $qId){
             
             $answer = $request->input($quiz_name .'_'. $qId->id);
             $correct_answer = $qId->correct_choose_num;
              if($answer ==  $correct_answer){
                  $resultCount ++;
                  
         }
             
         }
         
     }
      $result1 =$resultCount / $users;
     $result = ($result1 /$users)*100;
     
     
     return view('result', ['user_count' => $users,'result' => $result] );
});




//admin pages routes

Route::get('/adminhome',function(){
    return view('adminhome');
});

Route::get('/adminquizes/{user_id}',function($user_id){
    $adminquiz = Quiz::where('user_id',$user_id)->get();
    return view('adminquizes',
               ['adminquiz' => $adminquiz,]
               );
});


    
Route::get('/addquiz/{user_id}',function($user_id){
    $adminquiz = Quiz::where('user_id',$user_id)->get();
    $cat = Category::all();
    return view('addquiz',
               ['adminquiz' => $adminquiz,'cat' => $cat]
               );
});



    
    
Route::post('/quizinsert/{user_id}',function($user_id,Request $request){
    
    $newQuiz = new Quiz();
    $newQuiz->quiz_name=$request->input('admin_quiz_name');
    $newQuiz->cat_id=$request->input('admin_cat_id');
    $newQuiz->user_id=$request->input('admin_id');
    $newQuiz->save();
    
     
    $adminquiz = Quiz::where('user_id',$user_id)->get();
    $cat = Category::all();
    
    return view('addquiz',
               ['adminquiz' => $adminquiz,'cat' => $cat]
               );
});
    
    
Route::get('/editquiz/{quiz_name}/{quiz_id}',function($quiz_name1,$quiz_id,Request $request){
    
     $question = Questions::where('quiz_id',$quiz_id)->get();
    return view('editquiz',
               ['question' => $question,'id' => $quiz_id,'name' => $quiz_name1,]
               ); 
});

Route::post('/addquestion/{user_id}/{quiz_id}',function($user_id,$quiz_id){
    $adminquiz = Quiz::where('user_id',$user_id)->get();
    $cat = Category::all();
    return view('addquestion',
               ['adminquiz' => $adminquiz,'cat' => $cat,'id' => $quiz_id]
               );
});




    
Route::post('/questioninsert/{user_id}',function($user_id,Request $request){
    
    $newQusetion = new Questions();
    $newQusetion->question_name=$request->input('admin_question_name');
    $newQusetion->first_choose=$request->input('first_choose');
    $newQusetion->second_choose=$request->input('second_choose');
    $newQusetion->third_choose=$request->input('third_choose');
    $newQusetion->fourth_choose=$request->input('fourth_choose');
    $newQusetion->correct_choose_num=$request->input('admin_correct_choose');
    $newQusetion->quiz_id=$request->input('quiz_id');
    $newQusetion->save();
    
     
    $adminquiz = Quiz::where('user_id',$user_id)->get();
    $cat = Category::all();
    
    return view('adminquizes',
                ['adminquiz' => $adminquiz,'cat' => $cat,]
               );
});