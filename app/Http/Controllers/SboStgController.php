<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SboStgController extends Controller
{
    public function migrate()
    {
        $pos = 28;

        // foreach ($response['game_list'][213] as $game) {

        // if ($game['is_enabled'] == 0) continue;

        $markets = $this->marketType();

        foreach ($markets as $marketType) {
            $requestData[] = [
                'providerCode' => 'SBO',
                'providerName' => 'SBO Sportsbook',
                'gameCode' => $marketType == 'Mini Mines' ? '285' : '286',
                'gameName' => $marketType,
                'position' => $pos,
                'type' => 'arcade',
                'rtp' => $marketType == 'Mini Mines' ? '97.0' : '97.50',
                'imageUrl' => '-',
                'imageAlt' => $marketType,
            ];

            $pos++;
        }

        dd($requestData);
        // }

        // foreach ($requestData as $data) {
        //     dd($data);
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer 1|y3qi97hqjoxMTBI5OsYxn43OPyK3KHiYJIdnxo2V'
        //     ])->post(env('dummyAPI'), $data);
        //     // ])->post(env('ADD_GAME_API_STG', $data));

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function marketType()
    {
        return [
            'Mini Football Strike',
            'Mini Mines'
        ];
        // return [
        //     'ALL',
        //     'Handicap',
        //     'Odd/Even',
        //     'Over/Under',
        //     'Correct Score',
        //     '1X2',
        //     'Total Goal',
        //     'First Half Hdp',
        //     'First Half 1x2',
        //     'First Half O/U',
        //     'HT/FT',
        //     'Money Line',
        //     'First Half O/E',
        //     'First Goal/Last Goal',
        //     'First Half CS',
        //     'Double Chance',
        //     'Live Score',
        //     'First Half Live Score',
        //     'Outright',
        //     'Mix Parlay',
        //     'In Between',
        //     'First Half 1X2 & O/U',
        //     'D/C & First Half O/U',
        //     '1X2 & O/U',
        //     'D/C & O/U',
        //     'First Half RCS',
        //     'Reverse Correct Score',
        // ];
    }
}
