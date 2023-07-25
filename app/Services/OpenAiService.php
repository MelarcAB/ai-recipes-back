<?php


namespace App\Services;

use Orhanerday\OpenAi\OpenAi;


class OpenAiService
{

    private $model = "gpt-3.5-turbo-16k";

    private $temperature = 0.7;

    private $open_ai_key = "";

    public function __construct()
    {
        $this->open_ai_key = env('OPEN_AI_KEY');
    }


    public  function callGpt($prompt = "", $instructions = "")
    {
        $open_ai = new OpenAi(env('OPEN_AI_KEY'));
        $chat = $open_ai->chat([
            'model' =>  $this->model,
            'messages' => [
                [
                    "role" => "system",
                    "content" => $instructions ? $instructions : "Eres un asistente que genera recetas de cocina saludables a partir de los ingredientes que recibes."
                ],
                [
                    "role" => "user",
                    "content" => $prompt
                ],
            ],
            'temperature' => 1.0,
            'max_tokens' => 15000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        return $chat;
    }
}
