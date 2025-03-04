<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class HcgProdController extends Controller
{
    public function migrate()
    {
        $pos = 1;

        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'HCG',
                'providerName' => 'GB Game',
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
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_PROD')
        //         // ])->post(env('ADD_GAME_API_PROD'), $data);
        //     ])->post('dummyApi.com', $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //     ]));
        // }
    }

    private function gameList()
    {
        return [
            ["slots-Aquaman", "Aquaman", "96.80"],
            ["slots-Cleopatra", "Cleopatra", "96.80"],
            ["slots-LuckyKitty", "LuckyKitty", "96.80"],
            ["slots-TheOlympus", "The Olympus", "96.50"],
            ["slots-MahjongWaysPlus", "Mahjong Ways Plus", "96.50"],
            ["slots-Shiva", "Legends of india", "96.90"],
            ["Slots-Zeus", "Zeus", "94.58"],
            ["777res", "Fruits 777", "95.47"],
            ["SuperFruitSlots", "Fruit Mary", "95.08"],
            ["SlotsCaiShen", "God of Wealth", "95.19"],
            ["QHSlotsRes", "King of Fighters", "95.09"],
            ["WLZBslots", "Dragons War", "95.43"],
            ["slots-Mahjong3", "Mahjong Warrior", "96.09"],
            ["WaterMargin", "Water Margin", "94.98"],
            ["CardSlots", "Card Slots", "95.36"],
            ["slotPanda", "Kung Fu Panda", "95.19"],
            ["slots-Egypt-jewel", "Egyptian Treasure", "95.44"],
            ["slots-west-cowboy", "Western Cowboy", "95.37"],
            ["SlotsFootball", "Penalty Shootout", "95.42"],
            ["slots-Xiyouji", "The Journey to the West", "94.82"],
            ["slots-JurassicPark", "Jurassic Park", "95.28"],
            ["slots-Super777", "Super 777", "95.57"],
            ["slots-Ganesha", "Ganesha", "95.28"],
            ["slots-StreetFighter", "Street Fighter", "96.27"],
            ["slots-SuperMary", "Super Mario", "95.67"],
            ["slots-FootballGiants", "Big Soccer Club", "95.21"],
            ["slots-LockMary", "LockMary", "96.08"],
            ["slots-Tucaishen", "Rabbit God of Wealth", "96.19"],
            ["ChessSlots2", "Chinese chess", "95.02"],
            ["FuLinMen", "Blessings Coming", "95.04"],
            ["SlotsSnowQueen", "Snow Queen", "95.84"],
            ["slots-CrazyMary", "Crazy Mary", "96.90"],
            ["CardSlots_Fast", "Card Slots Speed", "96.50"],
            ["777res_Fast", "Fruits 777 Speed", "96.50"],
            ["SuperFruitSlots_Fast", "Fruit Mary Speed", "96.50"],
            ["NightShowSlots2", "Ye Xi Diao Chan", "95.21"],
            ["GoldRushMaster", "Lode Runner", "95.51"],
            ["SlotsWuSongZhuan", "Wu Song Biography II", "95.84"],
            ["slotZodiac", "Zodiac", "95.27"],
            ["slots-fish", "Fishing Match", "95.17"],
            ["Halloween", "Halloween", "95.43"],
            ["SlotsChristmas2", "Merry Christmas", "95.49"],
            ["SlotsCounselor", "Counselor", "95.02"],
            ["SlotsYearsEve", "New Year's Eve", "95.42"],
            ["SlotsGhostBride", "Ghost Bride", "96.09"],
            ["slots-date-night", "Sweetheart Night", "94.75"],
            ["SlotsShyLock", "Sherlock", "94.71"],
            ["Slots-Diamonds", "Diamond Coming", "95.72"],
            ["slots-king-of-club", "King of Club", "95.44"],
            ["slots-egg-hunt", "Seek Extras", "95.21"],
            ["slots-cockfighting", "Cockfighting", "95.35"],
            ["slots-fortune", "Fortune", "95.37"],
            ["SlotsQueenOfFire", "Fire Queen", "95.35"],
            ["SlotsLuffyLegend2", "Luffy of Legend2", "95.46"],
            ["SlotsTheCatSwordsman", "Puss Swords Man", "95.15"],
            ["SlotsFootball-njk", "Penalty Shootout3", "95.42"],
            ["SlotsYearsEve-njk", "New Year's Eve3", "95.47"],
            ["slotZodiac-njk", "Zodiac3", "95.27"],
            ["SlotsCaiShen-njk", "God of Wealth3", "95.19"],
            ["FuLinMen-njk", "Blessings Coming3", "95.04"],
            ["slots-SeaOfThieves", "Sea of Thieves", "94.38"],
            ["slots-Aladdin", "Aladdin", "95.32"],
            ["slots-four-beasts", "Four Divine Beasts", "96.25"],
            ["FuLinMen-Free", "Blessings Coming MegaBonus", "95.67"],
            ["WLZBslots-Free", "Dragons War MegaBonus", "95.43"],
            ["slots-date-night-Free", "Sweetheart Night MegaBonus", "94.75"],
            ["ChessSlots2-Free", "Chinese chess MegaBonus", "95.02"]
        ];
    }
}
