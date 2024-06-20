<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SboStgController extends Controller
{
    public function migrate()
    {
        // $response = Http::withHeaders([
        //     'ag-code' => 'MPO0114',
        //     'ag-token' => '3BQ9KGFtnQtno4kz12bMP4UqhVqWlWtz'
        // ])->post('https://uat.ps9games.com/gamelist', ['language' => 'en'])->json();

        // if ($response['status'] != 1) {
        //     dd($response);
        // }

        $pos = 1;

        // foreach ($response['game_list'][213] as $game) {

        // if ($game['is_enabled'] == 0) continue;

        $markets = $this->marketType();

        foreach ($markets as $marketType) {
            $requestData[] = [
                'providerCode' => 'SBO',
                'providerName' => 'SBO Sportsbook',
                'gameCode' => $marketType,
                'gameName' => $marketType,
                'position' => $pos,
                'type' => $marketType,
                'rtp' => 0,
                'imageUrl' => '-',
                'imageAlt' => $marketType,
            ];

            $pos++;
        }

        // dd($requestData);
        // }

        foreach ($requestData as $data) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 1|y3qi97hqjoxMTBI5OsYxn43OPyK3KHiYJIdnxo2V'
            ])->post('12.0.129.164/api/games/add', $data);

            Log::info(json_encode([
                'request' => $data,
                'response' => $response->body()
            ]));
        }
    }

    private function marketType()
    {
        return [
            'ALL',
            'Handicap',
            'Odd/Even',
            'Over/Under',
            'Correct Score',
            '1X2',
            'Total Goal',
            'First Half Hdp',
            'First Half 1x2',
            'First Half O/U',
            'HT/FT',
            'Money Line',
            'First Half O/E',
            'First Goal/Last Goal',
            'First Half CS',
            'Double Chance',
            'Live Score',
            'First Half Live Score',
            'Outright',
            'Mix Parlay',
            'In Between',
            'First Half 1X2 & O/U',
            'D/C & First Half O/U',
            '1X2 & O/U',
            'D/C & O/U',
            'First Half RCS',
            'Reverse Correct Score',
        ];
    }
}
