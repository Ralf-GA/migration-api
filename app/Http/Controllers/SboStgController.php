<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SboStgController extends Controller
{
    public function migrate()
    {
        // get Game List URL document 8.1
        // /web-root/restricted/information/get-game-list.aspx
        $response = Http::withHeaders([
            'CompanyKey' => env(''),
            'ServerId' => env(''),
            'GpId' => env(''), //! no id yet need confirmation
            'IsGetAll' => true,
        ])->get(env(''))->json();

        // $response = Http::withHeaders([
        //     'key' => env(''),
        //     'operator-name' => env(''),
        // ])->get(env(''))->json();

        if ($response['rs_code'] !== 'S-100')
            dd($response);

        // dd($response);
        $pos = 1;

        foreach ($response['seamlessGameProviderGames'] as $game) {
            // if ($game['newGameType'] !== 'Sportsbook')
            //     $request[] = $game['gameName'];

            if ($game['newGameType'] !== 'Sportsbook' || $this->gameRTP($game['gameID']) == 'not found') {
                // $request[] = [
                //     'game_name' => $game['gameName'],
                //     'game_rtp' => $this->gameRTP($game['gameID'])
                // ];
                continue;
            }

            $type = in_array($game['gameID'], [158, 132, 131]) ? 'arcade' : 'slot'; // TODO change game type

            // if (in_array($game['gameID'], [158, 132, 131]) == true) {
            //     $games[] = $game['gameName'];
            // }

            $requestData[] = [
                'providerCode' => 'SBO',
                'providerName' => 'SBO Sportsbook', //! get provider name
                'gameCode' => (string) $game['gameID'],
                'gameName' => $game['gameName'],
                'position' => $pos,
                'type' => $type,
                'rtp' => $this->gameRTP($game['gameID']),
                'imageUrl' => '-',
                'imageAlt' => $game['gameName'],
            ];

            $pos++;
        }

        // dd($request);
        // dd($games);
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
        // TODO get rtp list
        $rtps = [];

        return $rtps[$gameID] ?? 'not found';
    }
}
