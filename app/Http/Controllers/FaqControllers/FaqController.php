<?php
namespace App\Http\Controllers\FaqControllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;
use App\Guest;
class FaqController extends Controller
{

    public function faq()
     {
       $categories = Category::all();
       $categoriesFaq = Category::has('totalQuestions')->get();
       $faq = Question::with('answers')->where('status','1')->get();

       $header = 'Вопросы-Ответы';
       return view('faq/index')->with(['header'=>$header,
                                         'categories'=>$categories,
                                         'categoriesFaq'=>$categoriesFaq,
                                         'faq'=>$faq ]);
    }

    public function ask_question()
    {
       $header = 'Задать вопрос';
       $categories = Category::all();
     return view('faq/ask_question')->with(['header'=>$header,
                                            'categories'=>$categories]);
    }

     public function add_question(QuestionRequest $request)
     {

        $question = new Question;

        $question->category_id = $request->category_id;
        $question->question = $request->question;
        $question->save();

        $question_id = Question::select('id')->where('question', $request->question)->first();

        $guest = new Guest;
        $guest->nickname = $request->nickname;
        $guest->email = $request->email;
        $guest->question_id = $question_id->id;
        $guest->save();

        $header = 'Задать вопрос';
        $categories = Category::all();

        return view('faq/ask_question')->with(['header'=>$header,
                                          'categories'=>$categories]);
     }

}
