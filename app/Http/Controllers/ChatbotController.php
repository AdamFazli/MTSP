<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $userMessage = $request->input('message');

        if (empty($userMessage)) {
            return response()->json(['reply' => 'Please enter a question.']);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'mistralai/mistral-7b-instruct',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant for a mosque website. Help users understand features like infaq, membership registration, and prayer schedules.'],
                    ['role' => 'user', 'content' => $userMessage],
                ],
            ]);

            if ($response->successful()) {
                return response()->json([
                    'reply' => $response->json()['choices'][0]['message']['content']
                ]);
            } else {
                Log::error('OpenRouter API Error: ' . $response->body());
                return response()->json(['reply' => 'Sorry, the chatbot is currently unavailable.']);
            }
        } catch (\Exception $e) {
            Log::error('Chatbot Exception: ' . $e->getMessage());
            return response()->json(['reply' => 'Something went wrong. Please try again later.']);
        }
    }
}
