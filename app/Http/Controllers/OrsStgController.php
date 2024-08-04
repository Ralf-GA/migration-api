<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class OrsStgController extends Controller
{
    public function migrate()
    {
        $response = Http::withHeaders([
            'key' => env('ORS_KEY_STG'),
            'operator-name' => env('ORS_OPERATOR_NAME_STG'),
        ])->get(env('ORS_API_URL_STG'))->json();

        if ($response['rs_code'] !== 'S-100')
            dd($response);

        $pos = 1;

        foreach ($response['records'] as $game) {

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

            $pos++;
        }

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
        $rtps = [
            108 => '96.51',
            85 => '96.50',
            90 => '96.50',
            86 => '96.51',
            114 => '96.50',
            96 => '96.49',
            106 => '96.50',
            87 => '96.51',
            110 => '96.50',
            95 => '96.50',
            88 => '96.51',
            76 => '96.50',
            81 => '96.50',
            119 => '96.49',
            100 => '96.50',
            129 => '96.50',
            127 => '96.50',
            89 => '96.51',
            91 => '96.50',
            116 => '96.50',
            97 => '96.49',
            124 => '96.50',
            122 => '96.50',
            104 => '96.51',
            107 => '96.50',
            121 => '96.50',
            101 => '96.50',
            111 => '96.50',
            117 => '96.50',
            109 => '96.50',
            115 => '96.50',
            125 => '96.51',
            92 => '96.50',
            130 => '96.51',
            77 => '96.50',
            123 => '96.50',
            105 => '96.50',
            102 => '96.50',
            78 => '96.50',
            79 => '96.50',
            93 => '96.50',
            80 => '96.50',
            82 => '96.50',
            113 => '98.05',
            132 => '96.00',
            131 => '94.00',
            98 => '96.49',
            112 => '96.50',
            128 => '96.51',
            94 => '96.50',
            99 => '96.49',
            126 => '96.50',
            83 => '96.50',
            84 => '96.50',
            103 => '96.50',
            158 => '95.00',
            161 => '94.00',
            160 => '95.00',
        ];

        return $rtps[$gameID] ?? 'not found';
    }
}
