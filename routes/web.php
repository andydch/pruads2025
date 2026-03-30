<?php

use App\Http\Controllers\cms\LogoutController;
use App\Http\Controllers\dbg\MergeImageController;
use App\Http\Controllers\main\DisplayAgentController;
use App\Http\Middleware\CheckAuthMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::livewire('/idx', 'pages::main.template');
Route::resource('/display-agent/{slug}', DisplayAgentController::class)->except(['create','store','show','edit','update','destroy']);;

Route::group(
    [
        'prefix' => ENV("CMS_FOLDER"),
        'middleware' => [CheckAuthMiddleware::class]
    ],
    function () {
        Route::livewire('/', 'pages::cms.login.login-page')->withoutMiddleware([CheckAuthMiddleware::class]);
        Route::livewire('/cms-login', 'pages::cms.login.login-page')->name('login.login-page')->withoutMiddleware([CheckAuthMiddleware::class]);

        // agents
        Route::livewire('/agents-index', 'pages::cms.agent.index')->name('agent.index');
        // Route::livewire('/agents-create', 'pages::cms.agent.create')->name('cms.agent.create');

        // category
        Route::livewire('/category-index', 'pages::cms.category.index')->name('category.index');
        Route::livewire('/category-create', 'pages::cms.category.create')->name('category.create');
        Route::livewire('/category-edit/{id}', 'pages::cms.category.edit')->name('category.edit');
        
        // achievment
        Route::livewire('/achievement-index', 'pages::cms.achievement.index')->name('achievement.index');
        Route::livewire('/achievement-create', 'pages::cms.achievement.create')->name('achievement.create');
        Route::livewire('/achievement-edit/{id}', 'pages::cms.achievement.edit')->name('achievement.edit');

        //logout
        Route::get('/logout',[LogoutController::class, 'index'])->name('logout');
    }
);

Route::group(
    [
        'prefix' => 'oth',
        // 'middleware' => [CheckAuthMiddleware::class]
    ],
    function () {
        Route::get('/linkstorage', function () {
            Artisan::call('storage:link');
            return 'Storage link generated successfully!';
        });

        Route::get('/optimize', function () {
            Artisan::call('optimize:clear');
            return 'Optimize successfully!';
        });

        Route::livewire('/view-agent', 'pages::oth.view-agent');
    }
);

Route::group(
    [
        'prefix' => 'dbg',
        // 'middleware' => [CheckAuthMiddleware::class]
    ],
    function () {
        // posts index
        Route::livewire('/post-index', 'pages::posts.index')->name('posts.index');
        // posts create
        Route::livewire('/post-create', 'pages::posts.create')->name('posts.create');
        // posts edit
        Route::livewire('/post-edit/{id}', 'pages::posts.edit')->name('posts.edit');

        Route::resource('/merge-img', MergeImageController::class)->except(['create','store','show','edit','update','destroy']);
    }
);