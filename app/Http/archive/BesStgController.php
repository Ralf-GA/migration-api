<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class BesStgController extends Controller
{
    public function migrate()
    {
        $pos = 2;

        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'BES',
                'providerName' => 'Be Soft',
                'gameCode' => $game[0],
                'gameName' => $game[1],
                'position' => $pos,
                'type' => 'slot',
                'rtp' => $game[2],
                'imageUrl' => '-',
                'imageAlt' => $game[1],
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //     // ])->post(env('ADD_GAME_API_STG'), $data);
        //     ])->post('dummyApi.com', $data);

        //     // Log::info(json_encode([
        //     //     'request' => $data,
        //     //     'response' => $response->body()
        //     // ]));

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => 'test if no error'
        //     ]));
        // }
    }

    private function gameList()
    {
        return [
            ['afa002','Captains Gift','96.02'],
            ['afa003','Gift of Princess','96.5'],
            ['afa004','Dragon Stash','97'],
            ['afa005','Sugar Bonanza','97'],
            ['afa007','The Dog Team','96.59'],
            ['afa008','Ox 10x','97'],
            ['afa009','5 Kirin','96.5'],
            ['afa011','5 Bunny','97'],
            ['afa012','Book of 88','96.5'],
            ['afa013','Double Wolf Fortune','97.1'],
            ['afa014','Eyes Bonanza','96.49'],
            ['afa016','Kaboom Bonanza','96.5'],
            ['afa017','King of Thor','96.5'],
            ['afa018','Lion Jump','96.25'],
            ['afa019','Pyramid Money','97'],
            ['afa021','Sugar Crush','96.5'],
            ['afa022','Sugar Crush Xmas','96.5'],
            ['afa023','Supermarket Festive','96.44'],
            ['afa026','The Light of Egypt','96.5'],
            ['afa028','Wild West Gift','96.31'],
            ['afa030','Wild Wild Mouse','96.5'],
            ['be001','Duo Cai Duo Fu','97'],
            ['be002','Jackpot Cow','96.5'],
            ['be003','Flower of Magic','96.5'],
            ['be005','Mahjong Wins','96.38'],
            ['be006','Poker Ways','96.5'],
            ['be007','XiangQi Ways','96.5'],
            ['be008','Ganesha Wealth','96.5'],
            ['be009','Starry Princess','96.5'],
            ['be010','Pharaoh Treasures','97'],
            ['be011','Golden Gunslinger','96.31'],
            ['be013','Tasty Crush','97'],
            ['be014','Candy Frenzy','96.5'],
            ['be015','Tokyo Neko','96.4'],
            ['be016','Master Gemsword','96.05'],
            ['be017','Wild Wild Fruits','97.5'],
            ['be018','Lucky Tiger','96.5'],
            ['be019','Sweet Crush Xmas','96.5'],
            ['be020','Bikini Beach','96.5'],
        ];
    }
}
