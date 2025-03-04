<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class JdbProdController extends Controller
{
    public function migrate()
    {
        $pos = 93;

        $gameList = $this->arcadeGamelist();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'JDB',
                'providerName' => 'JDB',
                'gameCode' => $game[0],
                'gameName' => $game[1],
                'position' => $pos,
                'type' => 'arcade',
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
            ['14092', 'Dragon Soar - Hyper Wild', '96.95'],
            ['14091', 'Piggy Bank', '96.50'],
            ['14090', 'Wealthway', '96.99'],
            ['14089', 'Dragon Soar', '97.03'],
            ['14088', 'Magic Ace', '96.63'],
            ['14087', 'Pop Pop Candy', '96.32'],
            ['14086', 'Open Sesame Mega', '96.50'],
            ['14085', 'Fruity Bonanza', '96.44'],
            ['14084', 'Caishen Coming', '96.43'],
            ['14083', 'Coocoo Farm', '96.50'],
            ['14082', 'Elemental Link Water', '95.97'],
            ['14081', 'Birdsparty Deluxe', '97.00'],
            ['14080', 'Elemental Link Fire', '96.01'],
            ['14079', 'Moneybags Man 2', '96.19'],
            ['14077', 'Trump Card', '96.98'],
            ['14075', 'Fortune Neko', '95.99'],
            ['14070', 'Book Of Mystery', '96.42'],
            ['14068', 'Prosperity Tiger', '96.02'],
            ['14067', 'Glamorous Girl', '95.80'],
            ['14065', 'Blossom Of Wealth', '96.00'],
            ['14064', 'Boom Fiesta', '95.90'],
            ['14063', 'Big Three Dragons', '95.99'],
            ['14061', 'Mayagold Crazy', '95.90'],
            ['14060', 'Lantern Wealth', '95.91'],
            ['14059', 'Marvelous Iv', '96.20'],
            ['14058', 'Wonder Elephant', '95.95'],
            ['14055', 'Kong', '95.89'],
            ['14054', 'Lucky Diamond', '96.00'],
            ['14053', 'Spindrift 2', '97.00'],
            ['14052', 'Jungle Jungle', '95.99'],
            ['14051', 'Dragons Gate', '96.08'],
            ['14050', 'Spindrift', '96.00'],
            ['14048', 'Double Wilds', '96.10'],
            ['14047', 'Moneybags Man', '96.00'],
            ['14046', 'Miner Babe', '96.08'],
            ['14045', 'Super Niubi Deluxe', '96.50'],
            ['14044', 'Funky King Kong', '96.04'],
            ['14043', 'Golden Disco', '96.00'],
            ['14042', 'Treasure Bowl', '96.47'],
            ['14041', 'Mjolnir', '96.52'],
            ['14040', 'Pirate Treasure', '95.99'],
            ['14039', 'Fortune Treasure', '95.91'],
            ['14038', 'Egypt Treasure', '95.98'],
            ['14036', 'Super Niubi', '96.46'],
            ['14035', 'Dragons World', '95.94'],
            ['14034', 'Go Lai Fu', '96.99'],
            ['14033', 'Birds Party', '97.00'],
            ['14030', 'Triple King Kong', '96.45'],
            ['14029', 'Orient Animals', '95.96'],
            ['14027', 'Lucky Seven', '95.99'],
            ['14025', 'Lucky Racing', '95.90'],
            ['14022', 'Mining Upstart', '96.01'],
            ['14021', 'Rolling In Money', '95.89'],
            ['14018', 'Daji', '95.83'],
            ['14016', 'Kingsman', '96.29'],
            ['14012', 'Street Fighter', '96.00'],
            ['14010', 'Dragon', '96.21'],
            ['14008', 'Dragon Warrior', '96.28'],
            ['14007', 'One Punch Man', '96.15'],
            ['14006', 'Billionaire', '96.52'],
            ['14005', 'Mr. Bao', '96.25'],
            ['14003', 'Panda Panda', '96.18'],
            ['15012', 'Legendary 5', '95.84'],
            ['15010', 'Chef Panda', '96.28'],
            ['15005', 'Lucky Fuwa', '96.40'],
            ['15002', 'Monkey King', '96.49'],
            ['15001', 'Rooster In Love', '96.70'],
            ['8051', 'Xi Yang Yang', '95.99'],
            ['8050', 'Fortune Horse', '95.91'],
            ['8049', 'Flirting Scholar Tang Ii', '95.91'],
            ['8048', 'Open Sesameii', '95.87'],
            ['8047', 'Winning Mask Ii', '95.96'],
            ['8046', 'Guan Gong', '96.31'],
            ['8044', 'Beauty And The Kingdom', '96.37'],
            ['8035', 'Lucky Phoenix', '96.19'],
            ['8028', 'Lucky Miner', '96.27'],
            ['8023', 'Olympian Temple', '96.24'],
            ['8022', 'Mahjong', '96.32'],
            ['8021', 'Banana Saga', '96.28'],
            ['8020', 'Open Sesame', '96.25'],
            ['8019', 'Four Treasures', '96.32'],
            ['8018', 'Napoleon', '96.32'],
            ['8017', 'New Year', '96.37'],
            ['8015', 'Moonlight Treasure', '96.50'],
            ['8014', 'Lucky Lion', '96.28'],
            ['8007', 'Lucky Qilin', '96.00'],
            ['8006', 'Formosa Bear', '96.39'],
            ['8005', 'The Llama Adventure', '96.29'],
            ['8004', 'Wukong', '96.28'],
            ['8003', 'Winning Mask', '96.04'],
            ['8002', 'Flirting Scholar Tang', '96.49'],
            ['8001', 'Lucky Dragons', '96.16'],
        ];
    }

    private function arcadeGamelist()
    {
        return [
            ['7-7009', 'Fishing Legend', '97.00'],
            ['7-7008', 'Fighter Fire', '97.00'],
            ['7-7007', 'Fishing Disco', '96.00'],
            ['7-7006', 'Dragon Master', '96.50'],
            ['7-7005', 'Fishing Yilufa', '96.50'],
            ['7-7004', 'Shade Dragons Fishing', '97.00'],
            ['7-7003', 'Cai Shen Fishing', '97.00'],
            ['7-7002', 'Dragon Fishing II', '96.75'],
            ['7-7001', 'Dragon Fishing', '96.75'],
            ['9-9021', 'Mines2', '96.96'],
            ['9-9020', 'Mole Crash', '97.00'],
            ['9-9019', 'Dice', '97.00'],
            ['9-9018', 'Plinko', '97.01'],
            ['9-9017', 'Hilo', '96.90'],
            ['9-9016', 'Goal', '96.96'],
            ['9-9015', 'Firework Burst', '97.00'],
            ['9-9014', 'Mines', '96.82'],
            ['9-9013', 'Galaxy Burst', '97.08'],
            ['9-9012', 'Jogo Do Bicho', '96.00'],
            ['9-9011', 'Caishen Party', '96.27'],
            ['9-9010', 'Lucky Color Game', '97.00'],
            ['9-9009', 'King Of Football', '96.00'],
            ['9-9008', 'Crazy King Kong', '97.00'],
            ['9-9007', 'Super Super Fruit', '96.00'],
            ['9-9006', 'Huaguoshan Legends', '96.00'],
            ['9-9004', 'Beer Tycoon', '96.00'],
            ['9-9003', 'Birds And Animals', '95.97'],
            ['9-9002', 'Happy New Year', '96.32'],
            ['9-9001', 'Classic Mario', '96.13'],
            ['18-18026', 'Dragon Tiger - Joker Bonus', '96.51'],
            ['12-12003', 'Happy Lottery', '97.00'],
            ['12-12002', 'Gold Rooster Lottery', '96.99'],
            ['12-12001', 'Cai Shen Bingo', '95.91'],
        ];
    }
}
