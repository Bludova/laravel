<?php

namespace App\Http\Controllers\FaqControllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Theme;
use App\Question;
class FaqController extends Controller
{

    public function faq() {
DB::listen(function($query) {
    var_dump($query->sql, $query->bindings);
});

       // $theme = Theme::find(1)->themes()->get();
$category = Theme::find(1)->questions()->get();
// $theme = Question::find(1)->question()->get();
        dump($category);
         $header = 'Вопросы-Ответы';
         // $questions = Question::select(['question','theme_id','id'])
         // ->where('status','1')
         // ->get();
// $questions = Question::find(1);
         // dump($questions->question);

          $themes = Theme::select(['id','theme'])->get();
        return view('faq/index')->with(['header'=>$header,
                                         'themes'=>$themes]);
    }

}





// Например. Нам нужна модель Question. Модели Question и Category связаны через поля id в таблице categories и category_id в таблице questions Это значит, что в модель Category нужно добавить всего один метод:

// public function questions() { return $this->hasMany(‘App\Category’); }

// А дальше мы, имея объект модели Category можем получить все вопросы, относящиеся к этой модели:

// $category->questions;

// Если нам нужно достроить запрос, то:

// $category->questions()->get();

// (то есть после questions() можно добавить orderBy() или where() методы как в Quesry Builder)

// И да, как получить просто одну сущность, зная её id (пускай в переменной $id)

// $category = Category::find($id);

// Дальше эти же связи вполне можно использовать в представлении. Кроме того, есть метод count(), который возвращает кол-во элементов в коллекции, с которой вы работаете.

// То есть чтобы посчитать кол-во вопросов внутри категории, нужно будет вызвать:

// $category->questions->count();

// Ну а если это нужно сделать только имея его id, то это будет выглядеть так:

// Category::find($id)->questions->count();

// Также, если вы не уверены, что пользователь передал id существующей сущности, то хорошо было бы вместо find использовать findOrFail Тогда в случае отсутствия такой сущности, вернётся 404я ошибка.

// Если это не id, то нужно использовать условие через where. Но в случае с where, это у нас Query Builder, который строит запрос… Значит нужно использовать get() А get() в свою очередь возвращает не один элемент (даже если находится один), а коллекцию (некоторое подобие массивов). И тогда, чтобы получить первый элемент, можно использовать метод first() (или, если опять же хочется вернуть 404ю в случае отсутствия элементов, firstOrFail() )

// P.S. Category (а не category). Так по идее Laravel тоже поймёт, но по-английски правильно так)

























 // $themes = Theme::select(['id','theme_id','question'])->themes()->get();

   // $themes = Theme::find(1)->themes()->get();
   //      dump($themes);
//$sql = "SELECT  categories.categorie, categories.id AS categories_id,question.question, answer.answer, question.status  FROM categories JOIN question ON categories.id = question.categories_id JOIN answer ON answer.id_question = question.id ";


// $questionsAnswers = DB::table('categories')
//              ->leftJoin('question', 'question.categories_id', '=', 'categories.id')
//              ->leftJoin('answer', 'answer.id_question', '=', 'question.id')
//              ->where('question.status', '=', 1)
//              ->select('categories.*', 'question.question', 'answer.answer')
//              ->orderBy('categories.categorie','desc')
//              ->get();

// $categoriesQuestions = DB::table('categories')
//              ->join('question', function($join)
//              {
//                 $join->on('question.categories_id', '=', 'categories.id')
//                     ->where('question.status', '=', 1);
//               })
//              ->select('categories.*')
//              ->orderBy('categories.categorie', 'desc')
//              ->get();
// ->groupBy('categories.categorie')
 // dump($categoriesQuestions);


// ,
//                                         'questionsAnswers'=>$questionsAnswers,
//                                         'categoriesQuestions'=>$categoriesQuestions
// ,
//                                         'categories'=>$categories


         // $categories = DB::table('categories');
         // dump($categories);
