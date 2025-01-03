<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class YgrStgController extends Controller
{
    public function migrate()
    {
        $pos = 1;
        $gameList = $this->slotGames();
        $request = $this->createRequestData(
            position: $pos,
            gameList: $gameList,
            type: 'slot'
        );
        dump($request);

        $pos = 72;
        $gameList = $this->fishGames();
        $request = $this->createRequestData(
            position: $pos,
            gameList: $gameList,
            type: 'arcade'
        );
        dump($request);

        $pos = 81;
        $gameList = $this->arcadeGames();
        $request = $this->createRequestData(
            position: $pos,
            gameList: $gameList,
            type: 'arcade'
        );
        dump($request);

        dd();
        // $this->logTest(request: $request);
        // $this->insertGame(request: $request);
    }

    private function createRequestData(
        int $position,
        array $gameList,
        string $type
    ): array {
        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'YGR',
                'providerName' => 'YGR',
                'gameCode' => $game['gameCode'],
                'gameName' => $game['gameName'],
                'position' => $position,
                'type' => $type,
                'rtp' => $game['rtp'],
                'imageUrl' => '-',
                'imageAlt' => $game['gameName'],
            ];

            $position++;
        }

        return $requestData;
    }

    // private function insertGame(array $request): void
    // {
    //     foreach ($request as $data) {
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
    //         ])->post(env('ADD_GAME_API_STG'), $data);

    //         Log::info(json_encode([
    //             'request' => $data,
    //             'response' => $response->body()
    //         ]));
    //     }
    // }

    // private function logTest(array $request): void
    // {
    //     foreach ($request as $data) {
    //         Log::info(json_encode([
    //             'request' => $data,
    //         ]));
    //     }
    // }

    private function slotGames(): array
    {
        return [
            ['gameCode' => '097', 'gameName' => "Maya Golden City6", 'rtp' => '97'],
            ['gameCode' => '096', 'gameName' => "GOLDEN PHARAOH", 'rtp' => '97'],
            ['gameCode' => '095', 'gameName' => "Cash Maker 2", 'rtp' => '97'],
            ['gameCode' => '094', 'gameName' => "GOLDEN KINGDOM", 'rtp' => '97'],
            ['gameCode' => '093', 'gameName' => "Lucky Star2", 'rtp' => '97'],
            ['gameCode' => '092', 'gameName' => "Greek Mythology", 'rtp' => '97'],
            ['gameCode' => '091', 'gameName' => "R One", 'rtp' => '97'],
            ['gameCode' => '090', 'gameName' => "Maya Golden City5", 'rtp' => '97'],
            ['gameCode' => '089', 'gameName' => "Lucky Fortune God", 'rtp' => '97'],
            ['gameCode' => '088', 'gameName' => "Fortune Rolling", 'rtp' => '97'],
            ['gameCode' => '087', 'gameName' => "GO NEKO", 'rtp' => '97'],
            ['gameCode' => '086', 'gameName' => "Wealth Potion", 'rtp' => '97'],
            ['gameCode' => '085', 'gameName' => "R!CH", 'rtp' => '97'],
            ['gameCode' => '084', 'gameName' => "Maya Golden City4", 'rtp' => '97'],
            ['gameCode' => '083', 'gameName' => "ROMA GEMS", 'rtp' => '97'],
            ['gameCode' => '082', 'gameName' => "CASH RICH", 'rtp' => '97'],
            ['gameCode' => '081', 'gameName' => "Bison Gallop", 'rtp' => '97'],
            ['gameCode' => '080', 'gameName' => "FRENZY MONEY", 'rtp' => '97'],
            ['gameCode' => '079', 'gameName' => "Legendary Shaman", 'rtp' => '97'],
            ['gameCode' => '078', 'gameName' => "Super Neko", 'rtp' => '97'],
            ['gameCode' => '077', 'gameName' => "Cash Maker", 'rtp' => '97'],
            ['gameCode' => '076', 'gameName' => "Golden Bay Sands", 'rtp' => '97'],
            ['gameCode' => '075', 'gameName' => "Maya Golden City3", 'rtp' => '97'],
            ['gameCode' => '074', 'gameName' => "Bounty Pirate", 'rtp' => '97'],
            ['gameCode' => '073', 'gameName' => "Neon Night", 'rtp' => '97'],
            ['gameCode' => '072', 'gameName' => "Temple Adventure", 'rtp' => '97'],
            ['gameCode' => '071', 'gameName' => "Maya Golden City2", 'rtp' => '97'],
            ['gameCode' => '069', 'gameName' => "Barista BONANZA", 'rtp' => '97'],
            ['gameCode' => '067', 'gameName' => "Night of Millionaire", 'rtp' => '97'],
            ['gameCode' => '066', 'gameName' => "Chain Spin", 'rtp' => '97'],
            ['gameCode' => '065', 'gameName' => "MonteZuma's Treasure", 'rtp' => '97'],
            ['gameCode' => '064', 'gameName' => "Fruit & BAR", 'rtp' => '97'],
            ['gameCode' => '063', 'gameName' => "MahJong God", 'rtp' => '97'],
            ['gameCode' => '062', 'gameName' => "Maya Golden City", 'rtp' => '97'],
            ['gameCode' => '059', 'gameName' => "Cone BONANZA", 'rtp' => '97'],
            ['gameCode' => '058', 'gameName' => "Fu Lu Shou", 'rtp' => '97'],
            ['gameCode' => '057', 'gameName' => "Fish Prawn Crab", 'rtp' => '97'],
            ['gameCode' => '056', 'gameName' => "Treasure of Dragon", 'rtp' => '97'],
            ['gameCode' => '055', 'gameName' => "Lucky Doll", 'rtp' => '97'],
            ['gameCode' => '054', 'gameName' => "Dog's Vacation", 'rtp' => '97'],
            ['gameCode' => '053', 'gameName' => "Puffy Paradise", 'rtp' => '97'],
            ['gameCode' => '051', 'gameName' => "100x Lions 7", 'rtp' => '97'],
            ['gameCode' => '050', 'gameName' => "10x Lions 7", 'rtp' => '97'],
            ['gameCode' => '049', 'gameName' => "100x Diamond 7", 'rtp' => '97'],
            ['gameCode' => '048', 'gameName' => "Bank Robbery", 'rtp' => '97'],
            ['gameCode' => '045', 'gameName' => "Rich Mahjong 2", 'rtp' => '97'],
            ['gameCode' => '044', 'gameName' => "Candy Xmas", 'rtp' => '97'],
            ['gameCode' => '043', 'gameName' => "Lucky Star", 'rtp' => '97'],
            ['gameCode' => '042', 'gameName' => "Cleopatra", 'rtp' => '97'],
            ['gameCode' => '041', 'gameName' => "Money Rush", 'rtp' => '97'],
            ['gameCode' => '040', 'gameName' => "Super More Cash II", 'rtp' => '97'],
            ['gameCode' => '039', 'gameName' => "Sabong", 'rtp' => '97'],
            ['gameCode' => '038', 'gameName' => "Muay Thai", 'rtp' => '97'],
            ['gameCode' => '036', 'gameName' => "10x Diamond 7", 'rtp' => '97'],
            ['gameCode' => '035', 'gameName' => "Fortune God Coming", 'rtp' => '97'],
            ['gameCode' => '034', 'gameName' => "Dragon Egg", 'rtp' => '97'],
            ['gameCode' => '033', 'gameName' => "Piggy Bank", 'rtp' => '97'],
            ['gameCode' => '032', 'gameName' => "Piggy Boom", 'rtp' => '97'],
            ['gameCode' => '031', 'gameName' => "Gold Panda Rush", 'rtp' => '97'],
            ['gameCode' => '029', 'gameName' => "777 More Cash", 'rtp' => '97'],
            ['gameCode' => '028', 'gameName' => "Fortune Lucky 7", 'rtp' => '97'],
            ['gameCode' => '027', 'gameName' => "Lucky Dragon Ball 7", 'rtp' => '97'],
            ['gameCode' => '026', 'gameName' => "Rainbow & Clover 7", 'rtp' => '97'],
            ['gameCode' => '025', 'gameName' => "Super Fire 7", 'rtp' => '97'],
            ['gameCode' => '024', 'gameName' => "Lightning Respin 7", 'rtp' => '97'],
            ['gameCode' => '023', 'gameName' => "5X Diamond 7", 'rtp' => '97'],
            ['gameCode' => '022', 'gameName' => "Koi Respin 7", 'rtp' => '97'],
            ['gameCode' => '021', 'gameName' => "Fortune Lions 7", 'rtp' => '97'],
            ['gameCode' => '016', 'gameName' => "Rich Mahjong", 'rtp' => '97'],
            ['gameCode' => '004', 'gameName' => "Fortune Mahjong", 'rtp' => '97'],
            ['gameCode' => '001', 'gameName' => "Long Long Long 2", 'rtp' => '97']
        ];
    }

    private function fishGames(): array
    {
        return [
            ['gameCode' => '070', 'gameName' => "Make a Killing Fishing", 'rtp' => '97'],
            ['gameCode' => '068', 'gameName' => "Fortune Fishing", 'rtp' => '97'],
            ['gameCode' => '060', 'gameName' => "Captain Fishing", 'rtp' => '97'],
            ['gameCode' => '052', 'gameName' => "LongYa Fishing", 'rtp' => '97'],
            ['gameCode' => '030', 'gameName' => "Chill Fishing", 'rtp' => '97'],
            ['gameCode' => '020', 'gameName' => "Zuma's Honor", 'rtp' => '97'],
            ['gameCode' => '018', 'gameName' => "Dragon Zuma", 'rtp' => '97'],
            ['gameCode' => '017', 'gameName' => "Insect Master", 'rtp' => '97'],
            ['gameCode' => '012', 'gameName' => "Pirates Fishing", 'rtp' => '97']
        ];
    }

    private function arcadeGames(): array
    {
        return [
            ['gameCode' => '047', 'gameName' => "Pinball Fun", 'rtp' => '97'],
            ['gameCode' => '046', 'gameName' => "Scratch & Win", 'rtp' => '0'],
            ['gameCode' => '037', 'gameName' => "Rocket Challenge", 'rtp' => '97']
        ];
    }
}