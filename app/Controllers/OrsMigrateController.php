<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class OrsMigrateController
{
    public function migrate()
    {
        $response = Http::withHeaders([
            'key' => env('ORS_KEY'),
            'operator-name' => env('ORS_OPERATOR_NAME'),
        ])->get(env('ORS_API_URL'))->json();

        if ($response->rs_code !== 'S-100')
            dd($response);

        $pos = 1;

        foreach ($response['records'] as $game) {

            if ($game['game_type'] !== 'Slot Game') continue;

            $requestData[] = [
                'providerCode' => 'ORS',
                'providerName' => 'OG', // Change ProviderName
                'gameCode' => (string) $game['game_id'],
                'gameName' => $game['game_name'],
                'position' => $pos,
                'type' => $game['game_type'],
                // 'type' => 'slot',
                'rtp' => $game['game_id'],
                // 'rtp' => $this->gameRTP($game['game_id']),
                'imageUrl' => '-',
                'imageAlt' => $game['game_name'],
            ];

            $pos++;
        }

        foreach ($requestData as $data) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('BEARER_TOKEN')
            ])->post(env('dummyApi'), $data);
            // ])->post(env('ADD_GAME_API'), $data);

            Log::info(json_encode([
                'request' => $data,
                'response' => $response->body()
            ]));
        }
    }
}
