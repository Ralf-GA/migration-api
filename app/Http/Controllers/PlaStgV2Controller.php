<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PlaStgV2Controller extends Controller
{
    public function migrate()
    {
        $pos = 325;

        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $type = 'slot';
            if (in_array($game[2], ['POP Slots', 'Video Slots', 'Slot Machines']) === false)
                $type = 'arcade';

            $requestData[] = [
                'providerCode' => 'PLA',
                'providerName' => 'PLAYTECH SLOTS',
                'gameCode' => $game[0],
                'gameName' => $game[1],
                'position' => $pos,
                'type' => $type,
                'rtp' => $game[3],
                'imageUrl' => '-',
                'imageAlt' => $game[1],
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //     ])->post(env('ADD_GAME_API_STG'), $data);
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
            ['baws','Baccarat without Sidebets','Card Games','0'],
            ['bafr','Banca Francesa','Table Games','98.41'],
            ['ccro','Cash Collect Roulette','Table Games','97.30'],
            ['ccrobf','Cash Collect Roulette BF','Table & Card Games','97.40'],
            ['cpx5k','Cash Plane X5000','Arcade','95.99'],
            ['gpas_critmp_pop','Cash It Multiplayer','POP Arcade','97.00'],
            ['eufro','European Football Roulette','Table Games','97.30'],
            ['jbc','Jacks or Better Classic','Video Pokers','0'],
            ['gpas_kickitmp_pop','Kick It Multiplayer','POP Arcade','97.00'],
            ['mpbj','Multiplayer Blackjack','Card Games','99.58'],
            ['mpro','Multiplayer Roulette','Card Games','97.30'],
            ['qbjp','Quantum Blackjack Plus Instant Play','Card Games','99.84'],
            ['stywro','Spin Till You Win Roulette','Table Games','97.30'],
            ['gpas_diamdlux_pop','Diamond Match Deluxe','POP Slots','96.00'],
            ['gpas_dwpfbb1_pop','Double Digger B1','POP Slots','93.69'],
            ['gpas_sqmways_pop','Fire Blaze: Sky Queen Megaways','POP Slots','96.00'],
            ['gpas_ghlink2_pop','Gold Hit & Link: Tiger Jones','POP Slots','95.45'],
            ['gpas_ghitdevb1_pop','Gold Hit: Lil Demon B1','POP Slots','93.62'],
            ['gpas_ldmcashc_pop','Lil Demon: Mega Cash Collect','POP Slots','95.50'],
            ['gpas_samufur_pop','Samurai Fury','POP Slots','95.50'],
            ['gpas_woluckb1_pop',"Spin 'Em Round! B1",'POP Slots','93.09'],
            ['pop_bbw_qsp','Big Bad Wolf','POP Slots','97.34'],
            ['pop_85462c30_qsp','Big Bad Wolf Megaways','POP Slots','0'],
            ['pop_340fe252_qsp','Big Bad Wolf: Pigs of Steel','POP Slots','0'],
            ['pop_89191489_qsp','Book of Duat','POP Slots','0'],
            ['pop_9d921557_qsp',"Brawler's Bar Cash Collect",'POP Slots','0'],
            ['pop_e5856c4b_qsp','Brooklyn Bootleggers','POP Slots','0'],
            ['pop_93fdb01a_qsp','Cash Truck','POP Slots','0'],
            ['pop_98ab31e5_qsp','Cash Truck 2','POP Slots','0'],
            ['pop_10f85cb5_qsp','Cash Truck 3 Turbo','POP Slots','0'],
            ['pop_7c63a490_qsp','Cash Truck Xmas Delivery','POP Slots','0'],
            ['pop_ff6be051_qsp',"Catrina's Coins",'POP Slots','0'],
            ['pop_a43538aa_qsp','Dog Town Deal','POP Slots','0'],
            ['pop_dragonshrine_qsp','Dragon Shrine','POP Slots','96.55'],
            ['pop_eastrnemrlds_qsp','Eastern Emeralds','POP Slots','96.58'],
            ['pop_68f6f2e6_qsp','Eastern Emeralds Megaways','POP Slots','0'],
            ['pop_c1aa8d1f_qsp','Feasting Fox','POP Slots','0'],
            ['pop_goldenglyph_qsp','Golden Glyph','POP Slots','96.19'],
            ['pop_74e6d9ba_qsp','Golden Glyph 3','POP Slots','0'],
            ['pop_b55ba1d4_qsp','Hammer of Vulcan','POP Slots','0'],
            ['pop_4512e199_qsp','Raven Rising','POP Slots','0'],
            ['pop_skrfrtn_qsp','Sakura Fortune','POP Slots','96.58'],
            ['pop_518163c8_qsp','Sakura Fortune 2','POP Slots','0'],
            ['pop_7d18960b_qsp','Sticky Bandits Unchained','POP Slots','0'],
            ['pop_f345af8e_qsp','Warp Wreckers Power Glyph','POP Slots','94.03'],
            ['pop_db8e20f2_qsp','Wild Harlequin','POP Slots','0'],
            ['pop_winsfortune_qsp','Wins of Fortune','POP Slots','96.54'],
            ['gpas_1reeler_pop','1-Of-A-Kind','POP Slots','95.56'],
            ['gpas_aogiw_pop','Age of the Gods Scratch','POP Slots','95.00'],
            ['gpas_awildiw_pop','Anaconda Wild Scratch','POP Slots','95.00'],
            ['gpas_big5_pop','Animal Instinct','POP Slots','95.51'],
            ['gpas_blitziw_pop','Blitz Scratch','POP Slots','95.00'],
            ['gpas_srichesiw_pop','Cash Collect Scratch','POP Slots','95.00'],
            ['gpas_dmatch_pop','Diamond Match','POP Slots','95.41'],
            ['gpas_emptriw_pop','Empire Treasures Scratch','POP Slots','95.00'],
            ['gpas_extrfruits_pop','Extreme Fruits Ultimate Deluxe','POP Slots','96.00'],
            ['gpas_fgather_pop','Fairy Gathering: Thundershots','POP Slots','95.59'],
            ['gpas_fblazeiw_pop','Fire Blaze Scratch','POP Slots','95.00'],
            ['gpas_ffortune_pop','Fortune Fortune: Thundershots','POP Slots','95.52'],
            ['gpas_fcascade_pop','Fruity Showers','POP Slots','95.60'],
            ['gpas_eninca_pop','Grand Junction: Enchanted Inca','POP Slots','96.45'],
            ['gpas_hlfiw_pop','Halloween Fortune Scratch','POP Slots','95.00'],
            ['gpas_pahoy_pop','Plunder Ahoy!','POP Slots','95.51'],
            ['gpas_plink_pop','Pyramid Linx','POP Slots','95.95'],
            ['gpas_queenotp_pop','Queen of the Pyramids: Mega Cash Collect','POP Slots','95.41'],
            ['gpas_hrules_pop','Triple Stop: Hercules Rules','POP Slots','95.48'],
            ['gpas_wotgenie_pop','Ways of the Genie','POP Slots','95.48'],
        ];
    }
}
