<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class SabStgController extends Controller
{
    public function migrate()
    {
        $pos = 1;

        foreach ($this->betType() as $betType) {
            $requestData[] = [
                'providerCode' => 'SAB',
                'providerName' => 'SAB Sportsbook',
                'gameCode' => $betType,
                'gameName' => $betType,
                'position' => $pos,
                'type' => $betType,
                'rtp' => '0',
                'imageUrl' => '-',
                'imageAlt' => $betType,
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //         // ])->post(env('dummyAPI'), $data);
        //     ])->post(env('ADD_GAME_API_STG'), $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function betType()
    {
        return [
            // betType in excel
        ];
    
    }
}
