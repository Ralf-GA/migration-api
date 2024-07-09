<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SboProdController extends Controller
{
    public function migrate()
    {
        // $pos = 1;
        $pos = 30;

        $markets = $this->marketType();

        foreach ($markets as $marketType) {
            $gameCode = $type = $marketType;
            $rtp = '0';

            if ($marketType == 'Mini Mines') {
                $gameCode = '285';
                $rtp = '97.0';
                $type = 'arcade';
            }

            if ($marketType == 'Mini Football Strike') {
                $gameCode = '286';
                $rtp = '97.50';
                $type = 'arcade';
            }

            $requestData[] = [
                'providerCode' => 'SBO',
                'providerName' => 'SBO Sportsbook',
                'gameCode' => $gameCode,
                'gameName' => $marketType,
                'position' => $pos,
                'type' => $type,
                'rtp' => $rtp,
                'imageUrl' => '-',
                'imageAlt' => $marketType,
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_PROD')
        //         ])->post(env('dummyAPI'), $data);
        //     // ])->post(env('ADD_GAME_API_PROD'), $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function marketType()
    {
        return [
            // 'ALL',
            // 'Handicap',
            // 'Odd/Even',
            // 'Over/Under',
            // 'Correct Score',
            // '1X2',
            // 'Total Goal',
            // 'First Half Hdp',
            // 'First Half 1x2',
            // 'First Half O/U',
            // 'HT/FT',
            // 'Money Line',
            // 'First Half O/E',
            // 'First Goal/Last Goal',
            // 'First Half CS',
            // 'Double Chance',
            // 'Live Score',
            // 'First Half Live Score',
            // 'Outright',
            // 'Mix Parlay',
            // 'In Between',
            // 'First Half 1X2 & O/U',
            // 'D/C & First Half O/U',
            // '1X2 & O/U',
            // 'D/C & O/U',
            // 'First Half RCS',
            // 'Reverse Correct Score',

            // 'Mini Football Strike',
            // 'Mini Mines'

            'Asian 1X2',
            'FH 1X2',
            'FH Over/Under',
            'FH Handicap',
            'FirstHalfOneXTwo',
            'FirstHalfAsianHandicap',
            'CupWinner',
            'AsianHandicap',
            'FirstHalfOverUnder',
            'NotSupport',
        ];
    }
}
