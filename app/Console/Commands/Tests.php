<?php

namespace App\Console\Commands;

use App\Models\Ingredients;
use Illuminate\Console\Command;
use App\Services\OpenAiService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Tests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //info
        $this->info('Testing OpenAiService');

        //test
        // $openai = new OpenAiService();
        // $ejecucion = $openai->callDalle('plato de pollo con verduras');
        //string to json

        $ingredientes = Ingredients::all();
        $destinationPath = public_path('images/ingredients');

        // Comprobar si el directorio existe, si no, crearlo
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }

        // Cliente HTTP para hacer la solicitud y descargar la imagen
        $client = new Client();

        foreach ($ingredientes as $ingredient) {
            $this->info($ingredient->name);

            try {
                // Obtener la URL de la imagen del ingrediente
                $imageUrl = $ingredient->image;

                // Crear una extensión de archivo basada en la URL de la imagen
                $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);

                // Generar el nombre del archivo basado en el slug del ingrediente
                $filename = Str::slug($ingredient->name) . '.' . $extension;

                // Ruta completa del archivo
                $filePath = $destinationPath . '/' . $filename;

                // Descargar la imagen y guardarla en la ubicación especificada
                $response = $client->get($imageUrl, ['sink' => $filePath]);

                if ($response->getStatusCode() == 200) {
                    $this->info("Imagen descargada y guardada en: " . $filePath);
                } else {
                    $this->error("Error al descargar la imagen para: " . $ingredient->name);
                }
            } catch (\Exception $e) {
                $this->error("Error al procesar el ingrediente: " . $ingredient->name . ", error: " . $e->getMessage());
            }
        }
    }
}
