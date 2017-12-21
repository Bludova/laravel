<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });

// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
// 		  ->addPage()
// 	  	  ->setTitle('Dashboard')
// 		  ->setUrl(route('admin.dashboard'))
// 		  ->setPriority(100);

// 	  $page->addPage(\App\User::class);
// });

// or

// AdminSection::addMenuPage(\App\User::class)

return [
//all_admins new_admin catrgories new_category
    //     [
    //     'title' => 'Все администраторы',
    //     'url'   => route('admin.all_admins'),
    // ],

    // [
    //     'title' => 'Создать нового администратора',
    //     'url'   => route('admin.new_admin'),
    // ],


    [
        'title' => 'Все темы',
        'url'   => route('admin.all_catrgories'),
    ],



    // [
    //     'title' => 'Создать новую тему',
    //     'url'   => route('admin.new_category'),
    // ],

//Dashboard, Information
    // [
    //     'title' => 'Dashboard',
    //     'url'   => route('admin.dashboard'),
    // ],

    // [
    //     'title' => 'Information',
    //     'url'   => route('admin.information'),
    // ],


    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [

    //        \App\User::class,

    //        // or

           // (new Page(\App\User::class))
           //     ->setPriority(100)
           //     ->setIcon('fa fa-user')
           //     ->setUrl('users')
           //     ->setAccessLogic(function (Page $page) {
           //         return auth()->user()->isSuperAdmin();
           //     }),

           // or

           // new Page([
           //     'title'    => 'News',
           //     'priority' => 200,
           //     'model'    => \App\News::class
           // ]),

         //   // or
         //   (new Page(/* ... */))->setPages(function (Page $page) {
         //       $page->addPage([
         //           'title'    => 'Blog',
         //           'priority' => 100,
         //           'model'    => \App\Blog::class
			      // ));

			      // $page->addPage(\App\Blog::class);
    	    //   }),

           // or

           // [
           //     'title'       => 'News',
           //     'priority'    => 300,
           //     'accessLogic' => function ($page) {
           //         return $page->isActive();
    		     //  },
           //     'pages'       => [

           //         // ...

           //     ]
           // ]
       // ]
    // ];
];
