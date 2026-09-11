<?php

return [
    'enabled' => env('CHATBOT_ENABLED', true),
    'ai_enabled' => env('CHATBOT_AI_ENABLED', false),
    'api_key' => env('OPENAI_API_KEY'),
    'model' => env('CHATBOT_AI_MODEL', 'gpt-4.1-mini-2025-04-14'),
    'cache_seconds' => 300,
];
