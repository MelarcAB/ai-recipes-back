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

        if ($prompt == "") {
            return false;
        }

        if ($instructions == "") {
            $instructions = "Eres un asistente que  genera recetas de cocina en formato JSON a partir de los ingredientes que recibes.";
            $instructions .= "RESPONDES COMPLETAMENTE en formato JSON con los keys 'name','nutritional_values', 'ingredients' y 'instructions'. Intructions debe ser extenso y detallado.";
            $instructions .= "El key 'nutritional_values' y 'instructions' deben ser array.";
            $instructions .= "El key 'ingredients' será un string con cantidades.";
            $instructions .= "El key 'nutritional_values' tendrá 'calories', 'carbohydrates', 'protein', 'fat'.";
            $instructions .= "Ejemplo: {'name':'...','nutritional_values': [] , 'instructions': [{'step': '...'}]}";
            // $instructions .= "Tipo de receta: GRASIENTA y simple. Alrededor de 800calorias. Tus respuestas en formato JSON completamente.";
        }


        $chat = $open_ai->chat([
            'model' =>  $this->model,
            'messages' => [
                [
                    "role" => "system",
                    "content" => $instructions
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


        // Get Content
        $response = (json_decode($chat)->choices[0]->message->content);
        //llegara en formato json, convertir a array

        return $response;
    }
}
