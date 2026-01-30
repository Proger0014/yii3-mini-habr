<?php

declare(strict_types=1);

use App\Web;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;

return [
    Group::create()
        ->routes(
            Route::get('/')
                ->action(Web\HomePage\Action::class)
                ->name('home'),
        ),
    Group::create('/learn')
        ->routes(
            Route::get('/say[/{message}]')
                ->action(Web\Learn\Echo\Action::class)
                ->name('echo/web/say'),
            Route::methods(['GET', 'POST'], '/say-form')
                ->action(Web\Learn\Echo\MessageFormAction::class)
                ->name('echo/web/say-form'),
            Group::create('/api')
                ->routes(
                    Route::get('/say[/{message}]')
                        ->action(Web\Learn\Api\Echo\Action::class)
                        ->name('echo/api/say'),
                ),
        ),
];
