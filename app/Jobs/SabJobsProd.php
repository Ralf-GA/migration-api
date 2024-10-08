<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SabJobsProd extends Job
{
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Sending the API request for single game at a time
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('BEARER_TOKEN_PROD')
        ])->post('dummyApi', $this->data);
        // ])->post(env('ADD_GAME_API_PROD'), $data);

        Log::info(json_encode([
            'request' => $this->data,
            'response' => $response->body()
        ]));
    }
}
