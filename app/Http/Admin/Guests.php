<?php
namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


/**
 * Class Guests
 *
 * @property \App\Guest $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Guests extends Section implements Initializable
{
    /**
     * @var \App\User
     */
    protected $model = '\App\Guest';

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
            return \App\Guest::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
        });
    }

    /**
     * @var string
     */
    protected $title = 'Все пользователи';

    /**
     * @var string
     */
    protected $alias = 'all_guests';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {

        // remove if unused
        return \AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                \AdminColumn::text('id', '#')->setWidth('30px'),
                \AdminColumn::link('nickname', 'Nickname')->setWidth('100px'),
                \AdminColumn::text('email', 'Email')->setWidth('100px'),
                \AdminColumn::text('question.question', 'Вопрос')->setWidth('120px')
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
            \AdminFormElement::text('nickname', 'Nickname')->required(),
            \AdminFormElement::text('email', 'Email')->required(),
            \AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
    }


    /**
     * @return FormInterface
     */
    // public function onCreate()
    // {
    //    return $this->onEdit(null);

    // }


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

    // public function getCreateTitle()
    // {
    //
    // }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}




