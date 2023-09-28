<?php

namespace Khamdullaevuz\ErrorTelegram\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function call($method, $params = [])
    {
        $url = 'https://api.telegram.org/bot' . config('telegram.token') . '/' . $method;
        $data = Http::post($url, $params);
        return $data->json();
    }
}