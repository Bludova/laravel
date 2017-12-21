<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AdminSection;
use App\Category;
use App\Question;
// use App\User;
// use App\Http\Admin\Categories;

use SleepingOwl\Admin\Display\DisplayTable;
// use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
// use SleepingOwl\Admin\Contracts\Form\FormInterface;
// use SleepingOwl\Admin\Contracts\Initializable;
// use SleepingOwl\Admin\Section;
// use App\Http\Admin\Categories;


class AdminController extends Controller
{

        public function all_admins()
        {
            $header = 'Все администраторы';
            return AdminSection::view(view('admin/index',['header'=>$header ]), $header);
        }

        public function all_catrgories()
        {


// $books = \App\Category::all();
// // var_dump($books);
// foreach ($books as $book) {
//     echo $book->categoryQuestion;

// }

            $header = 'Все темы';
            return AdminSection::view(view('admin/index',['header'=>$header ]), $header);

        }



 public function catrgories()
        {
$headers = 'Все темыvvv';
dump($headers);
            return display();

            }

        }
     // $users = \AdminDisplay::datatables('users');
// dump($users);
// echo $title;

   // $users = \AdminDisplay::table('users');
     //$users = \AdminColumn::link('name');

     // echo  $title;

// $form = \AdminForm::form()->setElements([
//     \AdminFormElement::text('title', 'Title'),
// ]);

// dump($form);
// $topics = DB::table('categories')
//              ->leftJoin('question', 'question.categories_id', '=', 'categories.id')
//              ->leftJoin('answer', 'answer.id_question', '=', 'question.id')
//              ->select('categories.*', 'question.question','question.id AS question_id','question.status', 'answer.answer')
//              ->orderBy('categories.categorie','desc')
//              ->get();

// dump($categories);
// // dump($categories);
//return AdminSection::view(view('home', 'Заголовок')->with(['header'=>$header]);
    //     return view('home')->with(['header'=>$header]);
