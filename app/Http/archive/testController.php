<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class testController extends Controller
{
    public function testing()
    {
        $response = Http::withHeaders([])->post(
            'https://ex-api-demo-yy.568win.com/web-root/restricted/information/get-game-list.aspx',
            [
                'CompanyKey' => 'F34A561C731843F5A0AD5FA589060FBB',
                'ServerId' => 'GA-staging',
                // 'GpId' => 10000,
                'GpId' => 16,
                // 'GpId' => 202,
                // 'IsGetAll' => true,
            ]
        )->json();

        // dd($response);
        // dd($response->seamlessGameProviderGames[0]);

        foreach ($response['seamlessGameProviderGames'] as $game) {
            // if (isset($game['gameInfos']) && is_array($game['gameInfos'])) {
            foreach ($game['gameInfos'] as $info) {
                if (isset($info['gameName']) && $info['language'] == 'en') {
                    $data[] = $info['gameName'];
                }
            }
            // }
        }

        dd($data);

        $pos = 1;

        // foreach ($response['records'] as $game) {
        //     if ($this->gameRTP($game['game_id']) == 'not found') continue;

        //     $type = in_array($game['game_id'], [123, 124, 135]) ? 'arcade' : 'slot';

        //     $requestData[] = [
        //         'providerCode' => 'ORS',
        //         'providerName' => 'OG SLOT',
        //         'gameCode' => (string) $game['game_id'],
        //         'gameName' => $game['game_name'],
        //         'position' => $pos,
        //         'type' => $type,
        //         'rtp' => $this->gameRTP($game['game_id']),
        //         'imageUrl' => '-',
        //         'imageAlt' => $game['game_name'],
        //     ];

        //     $pos++;
        // }

        // dd($requestData);
    }
}
