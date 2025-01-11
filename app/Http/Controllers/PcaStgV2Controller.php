<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PcaStgV2Controller extends Controller
{
    public function migrate()
    {
        $pos = 126;

        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'PCA',
                'providerName' => 'PLAYTECH CASINO',
                'gameCode' => $game[0],
                'gameName' => Str::lower($game[1]),
                'position' => $pos,
                'type' => Str::lower($game[2]),
                'rtp' => $game[3],
                'imageUrl' => '-',
                'imageAlt' => Str::lower($game[1]),
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     // $response = Http::withHeaders([
        //     //     'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //     // // ])->post(env('ADD_GAME_API_STG'), $data);
        //     // ])->post('dummyApi.com', $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function gameList()
    {
        return [
            ['ubal', 'Baccarat Live', 'Baccarat', '0'],
            ['bs_bal', 'Bet On Baccarat', 'Baccarat', '0'],
            ['rodzl', 'American Roulette', 'Roulette', '94.74'],
            ['smplrol', 'K-Pop Roulette Live', 'Roulette', '97.30'],
            ['frofl', 'Live Football French Roulette', 'Roulette', '0'],
            ['frol', 'Live Football Roulette', 'Roulette', '0'],
            ['rofl', 'Live French Roulette', 'Roulette', '0'],
            ['lbrol', 'Lucky Ball Roulette Live', 'Roulette', '0'],
            ['fbrol', 'Mega Fire Blaze Roulette Live', 'Roulette', '97.30'],
            ['rol', 'Prestige Roulette', 'Roulette', '97.30'],
            ['qrol', 'Quantum Roulette Live', 'Roulette', '97.30'],
            ['qrodzl', 'Quantum Roulette x1000 Italiana', 'Roulette', '0'],
            ['sprol', 'Spread Bet Roulette Live', 'Roulette', '0'],
            ['sbrol', 'Sticky Bandits Roulette Live', 'Roulette', '97.30'],
            ['ccrol', 'Cash Collect Roulette Live', 'Roulette', '97.30'],
            ['abjl', 'All-Bet Blackjack Live', 'Blackjack', '0'],
            ['bjl', 'Blackjack Live', 'Blackjack', '0'],
            ['cbjl', 'Italian Cashback Blackjack', 'Blackjack', '0'],
            ['msbjl', 'Majority Rules Speed Blackjack', 'Blackjack', '0'],
            ['fbbjl', 'Mega Fire Blaze Blackjack Live', 'Blackjack', '0'],
            ['qabjlp', 'Quantum Blackjack Plus', 'Blackjack', '0'],
            ['ubjl', 'Unlimited Blackjack Live', 'Blackjack', '0'],
            ['7eml', 'Sette e Mezzo Live', 'Blackjack', '0'],
            ['sbjl', 'Speed Blackjack', 'Blackjack', '0'],
            ['sbdl', 'Sicbo Deluxe', 'SicBo', '0'],
            ['sbl', 'Speed SicBo', 'SicBo', '0'],
            ['dtl', 'Dragon Tiger Live', 'Dragon Tiger', '0'],
            ['bs_dtl', 'Bet On Dragon Tiger', 'Dragon Tiger', '0'],
            ['abl', 'Andar Bahar Live', 'Andar Bahar', '0'],
            ['abwl', 'Adventure Beyond Wonderland Live', 'Game Show', '0'],
            ['bbwl', 'Big Bad Wolf Live', 'Game Show', '0'],
            ['bfbl', 'Buffalo Blitz Live', 'Game Show', '95.96'],
            ['swle', 'Spin a Win Wild Brasileiro', 'Game Show', '0'],
            ['tgcsl', 'The Greatest Cards Show Live', 'Game Show', '96.67'],
            ['cml', 'Card Match Live', 'Game Show', '0'],
            ['swl', 'Live Spin A Win', 'Game Show', '0'],
            ['fbbl', 'Mega Fire Blaze Lucky Ball Live', 'Game Show', '0'],
            ['prstl', 'Busted Or Bailed', 'Game Show', '0'],
            ['bs_pokl', 'Bet on Poker', 'Poker', '0'],
            ['chel', "Casino Hold'em Live", 'Poker', '0'],
            ['3brgl', 'Live 3 Card Brag', 'Poker', '0'],
            ['tpl', 'Teen Patti Live', 'Poker', '0'],
            ['hilol', 'Live Hi-Lo', 'HI-Lo', '0']
        ];
    }
}
