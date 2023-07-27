<?php


namespace App\Services;

use Orhanerday\OpenAi\OpenAi;
//log
use Illuminate\Support\Facades\Log;

class OpenAiService
{

    private $model = "gpt-3.5-turbo-16k";

    private $temperature = 1;

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
            $instructions = "Eres un asistente español que genera recetas de cocina en formato JSON.";
            $instructions .= "Debes responder en formato JSON con los keys \"name\", \"nutritional_values\", \"ingredients\" y \"instructions\".";
            $instructions .= "El key \"nutritional_values\" y \"instructions\" deben ser arrays.";
            $instructions .= "El key \"ingredients\" será un string con las cantidades.";
            $instructions .= "El key \"nutritional_values\" será un array con los valores nutricionales totales.";
            $instructions .= "Ejemplo: {\"name\":\"...\",\"nutritional_values\":{\"calories\":...,\"proteins\":...,\"carbohydrates\":...,\"fats\":...},\"instructions\":[{\"step\":\"...\"}]}";
            $instructions .= "Puedes algunos o todos los elementos que te pasen.";
        }

        //log prompt into channel custom
        Log::channel('custom')->info($prompt);
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
        //Puede que haya texto antes de la respuesta json, por lo que se debe eliminar antes de decodificar
        $response = substr($response, strpos($response, "{"));


        return $response;
    }
}
