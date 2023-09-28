<?php

namespace Khamdullaevuz\ErrorTelegram\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class ErrorTelegramHandler extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(function(Throwable $e){
            if(config('app.env') == 'production' && !config('app.debug')){
                $telegram = new TelegramService('error');
                $telegram->call('sendMessage', [
                    'chat_id' => config('telegram.chat_id'),
                    'text' => "<code>Error\n\nDescription:\n{$e->getMessage()}\n\nFile:\n{$e->getFile()}\n\nLine: {$e->getLine()}\n\nStatus code: {$e->getCode()}\n\nDate: " . date('H:i:s d.m.Y') . "</code>",
                    'parse_mode' => "html"
                ]);
            }
        });
    }
}