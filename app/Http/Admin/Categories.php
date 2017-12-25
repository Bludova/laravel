<?php
namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Display\Extension\ColumnFilters;


class Categories extends Section implements Initializable
{
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
        $display = \AdminDisplay::table()
   ->setColumns([
        $category = \AdminColumn::link('category'),
        $totalQ =  \AdminColumn::count('totalQuestions'),
        $noAnswerQ =  \AdminColumn::count('noAnswerQuestions'),
        $hiddenQ =  \AdminColumn::count('hiddenQuestions')
    ]);
        $hiddenQ->getHeader()
            ->setTitle('Скрыто');

        $noAnswerQ->getHeader()
            ->setTitle('Без ответа');

        $totalQ->getHeader()
            ->setTitle('Всего вопросов');

        $category->getHeader()
            ->setTitle('Категория');
       return $display;
}

    /**
     * @param int $id
     *
     * @return FormInterface
     */


      public function onEdit($id)
    {
        $formCategory = \AdminForm::form()->addElement(
            \AdminFormElement::columns()
                ->addColumn([
                    \AdminFormElement::text('category', 'Категория')
                ], 10)
        );

        $tabs = \AdminDisplay::tabbed();
        $tabs->appendTab($formCategory,  'Категория');
        return $tabs;
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




