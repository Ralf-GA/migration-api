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

        $requestData = [];
        foreach ($this->betType() as $betType => $betTypeID) {
            $requestData[] = [
                'providerCode' => 'SAB',
                'providerName' => 'SAB Sportsbook',
                'gameCode' => $betTypeID,
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

        // Uncomment the code below when you are ready to make the actual API calls

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
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
            'Handicap' => 1,
            'Odd/Even' => 2,
            'Over/Under' => 3,
            'Correct Score' => 4,
            'FT.1X2' => 5,
            'Total Goal' => 6, 
            '1H Handicap' => 7, 
            '1H Over/Under' => 8, 
            'Mix Parlay' => 9,
            'Outright' => 10,
            'Total Corners' => 11,  
            '1H Odd/Even' => 12,
            'Clean Sheet' => 13,
            'First Goal/Last Goal' => 14,
            '1H 1X2' => 15,
            'HT/FT' => 16,
            '2H Handicap' => 17,
            '2H Over/Under' => 18,
            'Substitutes' => 19,
            'Moneyline' => 20,
            '1H Moneyline' => 21, 
            'Next Goal' => 22,
            'Next Corner' => 23,
            'Double Chance' => 24,
            'Draw No Bet' => 25,
            'Both/One/Neither Team To Score' => 26,
            'To Win To Nil' => 27,
            '3-Way Handicap' => 28,
            'System Parlay' => 29,
            '1H Correct Score' => 30, 
            'Win' => 31,
            'Place' => 32,
            'Win/Place' => 33,  
            'Single Match Parlay' => 38,
            'Win.UK Tote' => 41,
            'Place.UK Tote' => 42,
            'Win/Place.UK Tote' => 43,
            '5 min O/U' => 51,
            '15 min O/U' => 52,
            '30 min O/U' => 53,
            '45 min O/U' => 54,
            '60 min O/U' => 55,
            'End of day O/U' => 56,
            '5 min OE' => 57,
            '15 min OE' => 62,
            '30 min OE' => 63,
            '45 min OE' => 64,
            '60 min OE' => 65,

        ]; 
    }
}
