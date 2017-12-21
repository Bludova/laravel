<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Display\Extension\ColumnFilters;
use App\Category;
use App\Question;


class Categories extends Section implements Initializable
{
    protected $controllerClass = '\App\Http\Controllers\AdminControllers\AdminController@catrgories';

    /**
     * @var \App\User
     */
    protected $model = '\App\Category';
        /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Category::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
        });
    }

    /**
     * @var string
     */
    protected $title = 'Все темы';

    /**
     * @var string
     */
    protected $alias = 'all_catrgoriess';

    /**
     * @return DisplayInterface
     */

    public function onDisplay()
    {

function display()
{
//     $books = \App\Category::all();

// foreach ($books as $book) {
//     echo $book->categoryQuestion;

// }
    // $display->with('country', 'companies');
    $display = \AdminDisplay::table()
    ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                \AdminColumn::text('id', '#')->setWidth('30px'),
                 // \AdminColumn::text( 'id','e')->with( 'questions','category_id')->setWidth('30px'),
                 // \AdminColumn::text('id', '#')->categoryQuestion()->count(),
                \AdminColumn::link('category', 'Category')->setWidth('300px')

            )->paginate(10);
            // echo $display->with('questions');
   return $display;
};

 // return display();
// $books = \App\Category::all();
// // var_dump($books);
// foreach ($books as $book) {
//     echo $book->categoryQuestion->count();
// }
 // return display()->with('questions','id');


        // remove if unused
        // return \AdminDisplay::table()
        //     ->setHtmlAttribute('class', 'table-primary')
        //     ->setColumns(
        //         \AdminColumn::text('id', '#')->setWidth('30px'),
        //         \AdminColumn::link('category', 'Category')->setWidth('300px')
        //     )->paginate(10);

    }



    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // remove if unused
        return \AdminForm::panel()->addBody([
            \AdminFormElement::text('category', 'Category')->required(),
            \AdminFormElement::text('id', 'ID')->setReadonly(1),
            \AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
    }


    /**
     * @return FormInterface
     */
    public function onCreate()
    {
       return $this->onEdit(null);

    }


    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }

    public function getCreateTitle()
    {
        return 'Создать новую тему';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}




