<?php
namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Display\DisplayTree;
use SleepingOwl\Admin\Display;
/**
 * Class Answers
 *
 * @property \App\Answer $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */

class Answers extends Section implements Initializable
{
    /**
     * @var \App\User
     */
    protected $model = '\App\Answer';

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
            return \App\Answer::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
        });
    }

    /**
     * @var string
     */
    protected $title = 'Все Ответы';

    /**
     * @var string
     */
    protected $alias = 'all_answers';
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
       // remove if unused
        return \AdminDisplay::table()/*->with('users')*/
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                \AdminColumn::text('id', '#')->setWidth('30px'),
                \AdminColumn::link('answer', 'Answer')->setWidth('200px'),
                \AdminColumn::text('user_id', 'Admin №')->setWidth('100px'),
                 \AdminColumn::text('question_id', 'question №')->setWidth('30px')
            )->paginate(10);
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
            \AdminFormElement::text('answer', 'Aanswer')->required(),
            \AdminFormElement::text('user_id', 'Admin №')->required(),
            \AdminFormElement::text('question_id', 'question №')->required(),
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
        return 'Ответить на вопрос';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}




