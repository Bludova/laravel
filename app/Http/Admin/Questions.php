<?php
namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
/**
 * Class Question
 *
 * @property \App\Questions $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Questions extends Section implements Initializable
{
    /**
     * @var \App\Question
     */
    protected $model = '\App\Question';

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
            return \App\Question::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
        });
    }

    /**
     * @var string
     */
    protected $title = 'Все Вопросы';

    /**
     * @var string
     */
    protected $alias = 'all_questions';

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
                \AdminColumn::text('category_id', 'Category №')->setWidth('130px'),
                \AdminColumn::link('question', 'Question')->setWidth('200px'),
                \AdminColumn::link('status', 'Status')->setWidth('200px')
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
                \AdminFormElement::text('category_id', 'Category №')->required(),
                 \AdminFormElement::wysiwyg('question', 'Question'),
                 // \AdminFormElement::text('question', 'Question')->required(),
                  // \AdminColumn::link('status', 'Status')->setWidth('200px'),
                // \AdminFormElement::select('status', 'Status', $options = ['без ответа','опубликован','скрыт']),
            \AdminFormElement::text('id', 'ID')->setReadonly(1),
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
    //     return 'Создать нового вопроса';
    // }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}




