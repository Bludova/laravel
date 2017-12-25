<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use App\User;


class Users extends Section implements Initializable
{
    /**
     * @var \App\User
     */
    protected $model = '\App\User';

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
            return \App\User::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
        });
    }

    /**
     * @var string
     */
    protected $title = 'Все администраторы';

    /**
     * @var string
     */
    protected $alias = 'all_admin';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {

        // remove if unused
        return \AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                \AdminColumn::link('name', 'Name')->setWidth('200px'),
                \AdminColumn::text('email', 'Email')
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
            \AdminFormElement::text('name', 'Name')->required(),
            \AdminFormElement::text('email', 'Email')->required(),
            \AdminFormElement::password('password', 'Password')->hashWithBcrypt(),
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
        return 'Создать нового администратора';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}




