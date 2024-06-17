<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class OrsProdController extends Controller
{
    public function migrate()
    {
        $response = Http::withHeaders([
            'key' => env('ORS_KEY_PROD'),
            'operator-name' => env('ORS_OPERATOR_NAME_PROD'),
        ])->get(env('ORS_API_URL_PROD'))->json();

        if ($response['rs_code'] !== 'S-100')
            dd($response);

        $pos = 1;

        // dd($response);

        foreach ($response['records'] as $game) {

            if ($this->gameRTP($game['game_id']) == 'not found')
                // $request[] = $game['game_name'];
                continue;

            // Lucky Samurai, Pinslot, FruitSlicer

            $type = in_array($game['game_id'], [123, 124, 135]) ? 'arcade' : 'slot';

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

        // dd($request);
        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_PROD')
        //         // ])->post(env('ADD_GAME_API_PROD'), $data);
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
            78 => '96.51',
            79 => '96.50',
            80 => '96.50',
            81 => '96.51',
            82 => '96.50',
            83 => '96.49',
            84 => '96.50',
            85 => '96.51',
            86 => '96.50',
            87 => '96.50',
            88 => '96.51',
            89 => '96.50',
            90 => '96.50',
            91 => '96.49',
            92 => '96.50',
            93 => '96.50',
            94 => '96.50',
            95 => '96.51',
            96 => '96.50',
            97 => '96.50',
            98 => '96.49',
            99 => '96.50',
            100 => '96.50',
            101 => '96.51',
            102 => '96.50',
            103 => '96.50',
            104 => '96.50',
            105 => '96.50',
            106 => '96.50',
            107 => '96.50',
            108 => '96.50',
            109 => '96.51',
            110 => '96.50',
            111 => '96.51',
            112 => '96.50',
            113 => '96.50',
            114 => '96.50',
            115 => '96.50',
            116 => '96.50',
            117 => '96.50',
            118 => '96.50',
            119 => '96.50',
            120 => '96.50',
            122 => '98.05',
            123 => '96.00',
            124 => '94.00',
            125 => '96.49',
            126 => '96.50',
            127 => '96.51',
            128 => '96.50',
            129 => '96.49',
            130 => '96.50',
            131 => '96.50',
            132 => '96.50',
            133 => '96.50',
            135 => '95.00',
            136 => '94.00',
            137 => '95.00',
        ];

        return $rtps[$gameID] ?? 'not found';
    }
}
