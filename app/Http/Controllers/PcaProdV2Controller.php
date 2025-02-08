<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PcaProdV2Controller extends Controller
{
    public function migrate()
    {
        $pos = 1;
        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'PCA',
                'providerName' => 'PLAYTECH CASINO',
                'gameCode' => $game[1],
                'gameName' => Str::lower($game[0]),
                'position' => $pos,
                'type' => Str::lower($game[2]),
                'rtp' => $game[3],
                'imageUrl' => '-',
                'imageAlt' => Str::lower($game[0]),
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_PROD')
        //     // ])->post(env('ADD_GAME_API_PROD'), $data);
        //     ])->post('dummyApi.com', $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }

        dd('Inserted Games!');
    }

    private function gameList()
    {
        return [
            ['Baccarat Live','ubal','Baccarat','0'],
            ['Bet On Baccarat','bs_bal','Baccarat','0'],
            ['American Roulette','rodzl','Roulette','94.74'],
            ['K-Pop Roulette Live','smplrol','Roulette','97.30'],
            ['Live Football French Roulette','frofl','Roulette','0'],
            ['Live Football Roulette','frol','Roulette','0'],
            ['Live French Roulette','rofl','Roulette','0'],
            ['Lucky Ball Roulette Live','lbrol','Roulette','0'],
            ['Mega Fire Blaze Roulette Live','fbrol','Roulette','97.30'],
            ['Prestige Roulette','rol','Roulette','97.30'],
            ['Quantum Roulette Live','qrol','Roulette','97.30'],
            ['Quantum Roulette x1000 Italiana','qrodzl','Roulette','0'],
            ['Spread Bet Roulette Live','sprol','Roulette','0'],
            ['Sticky Bandits Roulette Live','sbrol','Roulette','97.30'],
            ['Cash Collect Roulette Live','ccrol','Roulette','97.30'],
            ['All-Bet Blackjack Live','abjl','Blackjack','0'],
            ['Blackjack Live','bjl','Blackjack','0'],
            ['Italian Cashback Blackjack','cbjl','Blackjack','0'],
            ['Majority Rules Speed Blackjack','msbjl','Blackjack','0'],
            ['Mega Fire Blaze Blackjack Live','fbbjl','Blackjack','0'],
            ['Quantum Blackjack Plus','qabjlp','Blackjack','0'],
            ['Unlimited Blackjack Live','ubjl','Blackjack','0'],
            ['Sette e Mezzo Live','7eml','Blackjack','0'],
            ['Speed Blackjack','sbjl','Blackjack','0'],
            ['Sicbo Deluxe','sbdl','SicBo','0'],
            ['Speed SicBo','sbl','SicBo','0'],
            ['Dragon Tiger Live','dtl','Dragon Tiger','0'],
            ['Bet On Dragon Tiger','bs_dtl','Dragon Tiger','0'],
            ['Andar Bahar Live','abl','Andar Bahar','0'],
            ['Adventure Beyond Wonderland Live','abwl','Game Show','0'],
            ['Big Bad Wolf Live','bbwl','Game Show','0'],
            ['Buffalo Blitz Live','bfbl','Game Show','95.96'],
            ['Spin a Win Wild Brasileiro','swle','Game Show','0'],
            ['The Greatest Cards Show Live','tgcsl','Game Show','96.67'],
            ['Card Match Live','cml','Game Show','0'],
            ['Live Spin A Win','swl','Game Show','0'],
            ['Mega Fire Blaze Lucky Ball Live','fbbl','Game Show','0'],
            ['Busted Or Bailed','prstl','Game Show','0'],
            ['Bet on Poker','bs_pokl','Poker','0'],
            ["Casino Hold'em Live",'chel','Poker','0'],
            ['Live 3 Card Brag','3brgl','Poker','0'],
            ['Teen Patti Live','tpl','Poker','0'],
            ['Live Hi-Lo','hilol','HI-Lo','0']
        ];
    }
}
