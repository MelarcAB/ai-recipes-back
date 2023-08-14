<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OpenAiService;

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
        $openai = new OpenAiService();
        $ejecucion = $openai->callDalle('plato de pollo con verduras');
        //string to json



        var_dump($ejecucion);
    }
}
