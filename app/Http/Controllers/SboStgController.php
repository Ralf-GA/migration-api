<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SboStgController extends Controller
{
    public function migrate()
    {
        $response = Http::withHeaders([
            'key' => env('ORS_KEY_STG'),
            'operator-name' => env('ORS_OPERATOR_NAME_STG'),
        ])->get(env('ORS_API_URL_STG'))->json();

        if ($response['rs_code'] !== 'S-100')
            dd($response);

        // dd($response);
        $pos = 1;

        foreach ($response['records'] as $game) {

            // if ($game['game_type'] !== 'Slot Game')
            //     $request[] = $game['game_name'];

            if ($game['game_type'] !== 'Slot Game' || $this->gameRTP($game['game_id']) == 'not found') continue;

            $type = in_array($game['game_id'], [158, 132, 131]) ? 'arcade' : 'slot';

            $requestData[] = [
                'providerCode' => 'ORS',
                'providerName' => 'OG SLOT',
                'gameCode' => (string) $game['game_id'],
                'gameName' => $game['game_name'],
                'position' => $pos,
                'type' => $type,
                'rtp' => $this->gameRTP($game['game_id']),
                'imageUrl' => '-',
                'imageAlt' => $game['game_name'],
            ];
            // $gameList[] = $game['game_name'];

            $pos++;
        }

        // dd($request);
        // dd($gameList);
        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //         // ])->post(env('ADD_GAME_API_STG'), $data);
        //     ])->post('dummyApi.com', $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function gameRTP($gameID)
    {
        $rtps = [];

        return $rtps[$gameID] ?? 'not found';
    }
}
