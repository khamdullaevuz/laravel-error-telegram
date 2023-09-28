<?php

namespace Khamdullaevuz\ErrorTelegram;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Khamdullaevuz\ErrorTelegram\Exceptions\ErrorTelegramHandler;

class ErrorTelegramServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }

    public function register(): void
    {
        $this->app->singleton(
            ExceptionHandler::class,
            ErrorTelegramHandler::class
        );
    }
}