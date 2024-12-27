<?php

namespace App\Http\Controllers;

use App\Services\TelegramBotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramBotController extends Controller
{

    public function __construct(private readonly TelegramBotService $telegramBotService)
    {
    }


    public function setWebhook()
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $url = "https://api.telegram.org/bot{$botToken}/setWebhook";

        $webhookUrl = env('APP_URL_HTTPS') . '/api/telegram/webhook';

        $response = Http::post($url, [
            'url' => $webhookUrl,
        ]);

        if ($response->successful()) {
            return response()->json(['status' => 'Webhook configurado correctamente']);
        } else {
            return response()->json(['status' => 'Error configurando el webhook'], 400);
        }
    }

    public function handle(Request $request)
    {
        $update = $request->all();
        $chatId = $update['message']['chat']['id'] ?? null;
        $text = $update['message']['text'] ?? null;

        if ($chatId && $text) {
            $message = $this->telegramBotService->getReports($text);
            $this->sendMessage($chatId, $message);
        }

        return response()->json(['status' => 'ok']);
    }

    private function sendMessage($chatId, $message)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }
}