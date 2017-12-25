<?php

namespace App\Providers;

// use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

// class AdminSectionsServiceProvider extends ServiceProvider
// {

//     /**
//      * @var array
//      */
//     protected $sections = [
//         \\\App\Users::class => 'App\Http\Sections\Users',
//          \App\User::class => 'App\Http\Admin\Users',
//     ];

//     /**
//      * Register sections.
//      *
//      * @return void
//      */
//     public function boot(\SleepingOwl\Admin\Admin $admin)
//     {
//     	//

//         parent::boot($admin);
//     }
// }


use SleepingOwl\Admin\Navigation\Page;
use AdminSection;
use PackageManager;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\Admin\Users',
        \App\Category::class => 'App\Http\Admin\Categories',
       \App\Question::class => 'App\Http\Admin\Questions',
       \App\Guest::class => 'App\Http\Admin\Guests',
       \App\Answer::class => 'App\Http\Admin\Answers',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        parent::boot($admin);

        $this->registerNRoutes();
        $this->registerNavigation();
        $this->registerMediaPackages();
    }

    private function registerNavigation()
    {
        \AdminNavigation::setFromArray([
            [
                'title' => trans('core.title.organisation'),
                'icon' => 'fa fa-group',
                'priority' => 1000,
                'pages' => [
                    (new Page(User::class))->setPriority(0),
                    (new Page(Category::class))->setPriority(300)
                ]
            ]
        ]);
    }

    private function registerNRoutes()
    {
        $this->app['router']->group(['prefix' => config('sleeping_owl.url_prefix'), 'middleware' => config('sleeping_owl.middleware')], function ($router) {
            $router->get('', ['as' => 'admin.dashboard', function () {
                $content = '';
                return AdminSection::view($content, 'Hi admin');
            }]);
        });
    }

    private function registerMediaPackages()
    {
        PackageManager::add('front.controllers')
            ->js(null, asset('js/controllers.js'));
    }
}
