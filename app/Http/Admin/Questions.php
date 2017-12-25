<?php
namespace App\Http\Admin;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use KodiComponents\Navigation\Badge;
use SleepingOwl\Admin\Form\Element\NamedFormElement;
use SleepingOwl\Admin\Form\FormElement;
use AdminDisplayFilter;
use App\Model\NewsTabsBadges;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
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
        $columns = [
            \AdminColumn::text('question', 'Вопрос'),
            \AdminColumn::text('themes.category', 'Категория'),
            \AdminColumn::datetime('created_at', 'Дата')->setWidth('150px'),
            \AdminColumnEditable::checkbox('status', 'Опубликован','Не опубликован','Статус')
        ];
            $table = \AdminDisplay::table()->setModelClass(\App\Question::class)->setApply(function($query) {
            $query->orderBy('created_at', 'desc');
        })->paginate(10)->setColumns($columns);

            $tablePublushed = \AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('created_at', 'desc');
        })->paginate(10)->getScopes()->set('status') ->setColumns($columns);

            $tableUnpublushed = \AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('created_at', 'desc');
        })->paginate(10)->getScopes()->set('status')->setColumns($columns);
        return $table ;
   }

    /**
     * @param int $id
     *
     * @return FormInterface
     */

    public function onEdit($id)
    {
        $formQuestion = \AdminForm::form()->addElement(
            \AdminFormElement::columns()
                ->addColumn([
                    \AdminFormElement::select('category_id', 'Категория', \App\Category::class)->setDisplay('category')
                ], 12)
                ->addColumn([
                    \AdminFormElement::textarea('question', 'Вопрос')->required()
                ], 12)
                        ->addColumn([
                   \AdminFormElement::select('status', 'Статус', ['0'=>'без ответа','1'=>'опубликован','2'=>'скрыт'])
                ], 3)

        );
        $formAnswer = \AdminForm::form()->addElement(
            new \SleepingOwl\Admin\Form\FormElements([
                \AdminFormElement::textarea('answers.answer', 'Ответ')->required(),
                 \AdminFormElement::select('answers.user_id', 'Ответил', \App\User::class)->setDisplay('name')->required()
            ])
        );
        $formGuest = \AdminForm::form()->addElement(
            new \SleepingOwl\Admin\Form\FormElements([
                \AdminFormElement::text('questionGuest.nickname', 'Никнейм')->required(),
                \AdminFormElement::text('questionGuest.email', 'Email')->required()

            ])
        );
        $tabs = \AdminDisplay::tabbed();
        $tabs->appendTab($formQuestion,  'Вопрос');
        $tabs->appendTab($formAnswer,     'Ответить');
        $tabs->appendTab($formGuest,   'Автор');
        return $tabs;
    }

    /**
     * @return FormInterface
     */
    // public function onCreate()
    // {
    //    // return $this->onEdit(null);
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
    //      return 'Создать вопрос';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
