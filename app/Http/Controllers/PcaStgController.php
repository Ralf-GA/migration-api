<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PcaStgController extends Controller
{
    public function migrate()
    {
        $pos = 1;

        $gameList = $this->gameList();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'PCA',
                'providerName' => 'PLAYTECH CASINO',
                'gameCode' => $game[0],
                'gameName' => Str::lower($game[1]),
                'position' => $pos,
                'type' => Str::lower($game[2]), // !!unsure
                'rtp' => '0',
                'imageUrl' => '-',
                'imageAlt' => Str::lower($game[1]),
            ];

            $pos++;
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('BEARER_TOKEN_STG')
        //     // ])->post(env('ADD_GAME_API_STG'), $data);
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
            ["3brgl;brag_3cardbrag", "3 Card Brag", "Live 3 Card Brag"],
            ["abwl;abwl_wonderland", "Adventures Beyond Wonderland", "Adventures Beyond Wonderland"],
            ["abjl;abjl_allbetsblackjack", "All Bets Blackjack", "All Bets Blackjack"],
            ["rodzl;rodzl_doublezero", "American Roulette", "Live American Roulette"],
            ["abl;abl_andarbahar", "Andar Bahar", "Andar Bahar"],
            ["rol;rol_arabicroulette", "Arabic Roulette", "Live Roulette"],
            ["rol;rol_slingshot", "Auto Roulette", "Live Roulette"],
            ["rol;rol_autoroulette2", "Auto Roulette 2", "Live Roulette"],
            ["ubal;bal_baccarat1", "Baccarat", "Live Baccarat"],
            ["ubal;bal_speedbaccarat2", "Baccarat Brasileira", "Mini Baccarat"],
            ["ubal;nc_bal_speedbaccarat2", "Baccarat Brasileira NC", "Live No Commission Baccarat"],
            ["ubal;nc_bal_baccarat1", "Baccarat NC", "Live No Commission Baccarat"],
            ["ubal;bal_soireebaccarat", "Baccarat Soirée", "Regular Blackjack"],
            ["ubal;nc_bal_soireebaccarat", "Baccarat Soirée NC", "Regular Blackjack"],
            ["bs_bal;bal_betslipbaccarat", "Bet On Baccarat", "Betslip Baccarat"],
            ["bs_dtl;bs_dtl_betondragontiger", "Bet On Dragon Tiger", "Bet On Dragon Tiger"],
            ["bs_pokl;bs_pokl_betonpoker", "Bet On Poker", "Bet On Poker"],
            ["bbwl;bbwl_bigbadwolf", "Big Bad Wolf Live", "Big Bad Wolf Live"],
            ["bjl;blj_blackjack1", "Blackjack 1", "Regular Blackjack"],
            ["bjl;blj_blackjack10", "Blackjack 10", "Regular Blackjack"],
            ["bjl;blj_blackjack2", "Blackjack 2", "Regular Blackjack"],
            ["bjl;blj_blackjack3", "Blackjack 3", "Regular Blackjack"],
            ["bjl;blj_blackjack4", "Blackjack 4", "Regular Blackjack"],
            ["bjl;blj_blackjack5", "Blackjack 5", "Regular Blackjack"],
            ["bjl;blj_blackjack6", "Blackjack 6", "Regular Blackjack"],
            ["bjl;blj_blackjack7", "Blackjack 7", "Regular Blackjack"],
            ["bjl;blj_blackjack8", "Blackjack 8", "Regular Blackjack"],
            ["bjl;blj_blackjack9", "Blackjack 9", "Regular Blackjack"],
            ["bjl;bjl_italianobj1", "Blackjack Italiano 1", "Regular Blackjack"],
            ["bjl;bjl_italianobj2", "Blackjack Italiano 2", "Regular Blackjack"],
            ["bjl;bjl_blackjackitalianovip", "Blackjack Italiano VIP", "Regular Blackjack"],
            ["bjl;bjl_soireebj1", "Blackjack Soirée 1", "Regular Blackjack"],
            ["bjl;bjl_soireebj2", "Blackjack Soirée 2", "Regular Blackjack"],
            ["bjl;bjl_soireebj3", "Blackjack Soirée 3", "Regular Blackjack"],
            ["bjl;bjl_persoireebj1", "Blackjack Soirée Gold 1", "Regular Blackjack"],
            ["bjl;bjl_persoireebj2", "Blackjack Soirée Gold 2", "Regular Blackjack"],
            ["bjl;bjl_persoireebj3", "Blackjack Soirée Gold 3", "Regular Blackjack"],
            ["bjl;bjl_persoireebj4", "Blackjack Soirée Gold 4", "Regular Blackjack"],
            ["rofl;rofl_triumphrol", "Bucharest French Roulette", "Live French Roulette"],
            ["rol;rol_triumphrol", "Bucharest Roulette", "Live Roulette"],
            ["bfbl;bfbl_espanaslots", "Buffalo Blitz España", "Buffalo Blitz Slots"],
            ["bfbl;bfbl_liveslots", "Buffalo Blitz Live Slots", "Buffalo Blitz Slots"],
            ["chel;chel_casinoholdem", "Casino Hold'em", "Live Casino Hold'em"],
            ["bjl;bjl_colombiabj", "Colombia Blackjack", "Regular Blackjack"],
            ["bjl;bjl_deutschbj", "Deutsches Blackjack", "Regular Blackjack"],
            ["rol;rol_deutschrol", "Deutsches Roulette", "Live Roulette"],
            ["dtl;dtl_dragontiger", "Dragon Tiger", "Live Dragon Tiger"],
            ["ubal;bal_emperorbaccarat", "Emperor Baccarat", "Live Baccarat"],
            ["ubal;nc_bal_emperorbaccarat", "Emperor Baccarat NC", "Live Baccarat"],
            ["cml;cml_cardmatch", "Football Card Showdown Live", "Card Match Live"],
            ["frofl;rofl_livefootballroulette", "Football French Roulette", "Football French Roulette"],
            ["frol;rol_livefootballrol", "Football Roulette", "Football Roulette"],
            ["rofl;rofl_loungerol", "French Roulette", "Live French Roulette"],
            ["ubal;bal_speedbaccarat3", "Gangnam Speed Baccarat", "Live Baccarat"],
            ["ubal;nc_bal_speedbaccarat3", "Gangnam Speed Baccarat NC", "Live No Commission Baccarat"],
            ["ubal;bal_grandbaccarat", "Grand Baccarat", "Live Baccarat"],
            ["ubal;nc_bal_grandbaccarat", "Grand Baccarat NC", "Live No Commission Baccarat"],
            ["bjl;bjl_grandbjl", "Grand Blackjack", "Regular Blackjack"],
            ["qrol;qrol_quantumgreek", "Greek Quantum Roulette", "Live Quantum Roulette"],
            ["rol;rol_greekrol", "Greek Roulette", "Live Roulette"],
            ["rol;rol_roulette1", "Hindi Roulette", "Live Roulette"],
            ["cbjl;abjl_italianbj", "Italian Cashback Blackjack", "All Bets Blackjack"],
            ["ubal;bal_baccaratko", "Jade Baccarat", "Baccarat"],
            ["ubal;nc_bal_baccaratko", "Jade Baccarat NC", "Baccarat"],
            ["bjl;bjl_blackjackko", "Jade Blackjack", "Regular Blackjack"],
            ["bjl;bjl_blackjack2ko", "Jade Blackjack 2", "Regular Blackjack"],
            ["ubal;bal_squeezebaccarat", "Japanese Squeeze Baccarat", "Mini Baccarat"],
            ["ubal;nc_bal_squeezebaccarat", "Japanese Squeeze Baccarat NC", "Live No Commission Baccarat"],
            ["smplrol;smplrol_kpoprol", "K-Pop Roulette Live", "K-Pop Roulette Live"],
            ["lbrol;frol_luckyballrol", "Luckyball Roulette Live", "Live Roulette"],
            ["msbjl;msbjl_speedbj", "Majority Rules Speed Blackjack", "Majority Rules Speed Blackjack"],
            ["fbbjl;fbbjl_fireblazebj", "Mega Fire Blaze Blackjack Live", "Fire Blaze Blackjack"],
            ["fbrol;fbrol_fireblazerol", "Mega Fire Blaze Roulette Live", "Fire Blaze Roulette"],
            ["fbrol;fbrol_espanafireblaze", "Mega Fire Blaze Ruleta España", "Fire Blaze Roulette"],
            ["rol;rol_dutchroulette", "Nederlandstalige Roulette", "Live Roulette"],
            ["rol;rol_prestigerol", "Prestige Roulette", "Live Roulette"],
            ["ubal;bal_persoireebaccarat", "Punto Banco Soirée Gold", "Baccarat"],
            ["qabjlp;qabjl_quantumbj", "Quantum Blackjack Plus", "Quantum Blackjack"],
            ["qrol;rol_quantumroulette", "Quantum Roulette Live", "Quantum Roulette"],
            ["qrol;qrol_quantumrol2", "Quantum Ruleta España", "Live Quantum Roulette"],
            ["rol;rol_brazilianrol", "Roleta Brasileira", "Live Roulette"],
            ["rol;rol_loungerol", "Roulette", "Live Roulette"],
            ["rol;rol_rouletteitaliana", "Roulette Italiana", "Live Roulette"],
            ["bjl;bjl_royalebj1", "Royale Blackjack 1", "Regular Blackjack"],
            ["bjl;bjl_royale2", "Royale Blackjack 2", "Regular Blackjack"],
            ["bjl;bjl_royalebj3", "Royale Blackjack 3", "Regular Blackjack"],
            ["bjl;bjl_royale4", "Royale Blackjack 4", "Regular Blackjack"],
            ["ubal;nc_7bal_speedbaccarat", "Ru Yi Speed Baccarat NC", "No Commission Baccarat 7 seat Baccarat"],
            ["qrol;qrol_autoruleta2", "Ruleta Automática Cuántica", "Live Quantum Roulette"],
            ["rofl;rofl_ruyiroulette", "Ruyi 如意 French Roulette", "Live French Roulette"],
            ["rol;rol_ruyiroulette", "Ruyi 如意 Roulette", "Live Roulette"],
            ["7eml;7eml_7emezzo", "Sette E Mezzo", "7 e Mezzo"],
            ["sbdl;sbdl_deluxesicbo", "SicBo Deluxe", "Sic Bo Deluxe"],
            ["rol;rol_ruletaslingshot2", "Slingshot Ruleta España", "Live Roulette"],
            ["abjl;abjl_allbetsblackjack2", "Soho All Bets Blackjack", "All Bets Blackjack"],
            ["bjl;bjl_soireepriveebj", "Soirée Privée Blackjack", "Regular Blackjack"],
            ["ubal;bal_goldenbac1", "Speed 6 Scanner Baccarat", "Live Baccarat"],
            ["ubal;nc_bal_goldenbac1", "Speed 6 Scanner Baccarat NC", "Live No Commission Baccarat"],
            ["rol;rol_primeslingshot", "Speed Auto Roulette", "Live Roulette"],
            ["ubal;bal_minibaccarat", "Speed Baccarat", "Live Baccarat"],
            ["ubal;bal_speedbaccarat1", "Speed Baccarat Korean", "Mini Baccarat"],
            ["ubal;nc_bal_speedbaccarat1", "Speed Baccarat Korean NC", "Live No Commission Baccarat"],
            ["ubal;nc_bal_minibaccarat", "Speed Baccarat NC", "Live No Commission Baccarat"],
            ["ubal;7bal_speedbaccarat", "Speed Baccarat Ru Yi ", "7 Seat Baccarat"],
            ["rol;rol_speedrol", "Speed Roulette", "Live Roulette"],
            ["sbl;sbl_sicbo", "Speed Sic Bo", "Sic Bo"],
            ["swl;swl_spinawin", "Spin a Win", "Live Spin a Win"],
            ["swle;swle_spinawinwild", "Spin A Win Wild Brasileiro", "Spin a Win Wild Live"],
            ["sprol;sprol_perspreadbetrol", "Spread Bet Roulette", "Spread Bet Roulette"],
            ["tpl;tpl_teenpatti", "Teen Patti Live", "Teen Patti"],
            ["tgcsl;tgcsl_cardshow", "The Greatest Cards Show Live", "The Greatest Card Show"],
            ["rol;rol_turkishrol", "Turkish Roulette", "Live Roulette"],
            ["ubjl;ubjl_unlimitedbj", "Unlimited Blackjack", "Live Unlimited Blackjack"],
            ["qrodzl;qrodzl_quantumita", "x1000 Quantum Roulette", "Quantum Double Zero Roulette"],
            ["sbrol;sbrol_stickybanditsrol", "Sticky Bandits Roulette Live", "Sticky Bandits Roulette Live"],
            ["bjl;bjl_soireebj4", "Blackjack Soirée 4", "Blackjack Soirée 4"],
            ["bjl;bjl_perublackjack", "Blackjack 11", "Regular Blackjack"],
            ["ccrol;ccrol_cashcollect", "Cash Collect Roulette Live", "Cash Collect Roulette Live"],
            ["qrol;qrol_quantumautorol", "Bucharest Quantum Roulette", "Live Roulette"],
            ["bjl;bjl_perublackjack12", "Blackjack 12", "Live Blackjack"],
            ["bjl;bjl_perublackjack13", "Blackjack 13", "Live Blackjack"],
            ["hilol;hilo_hilowestern", "Hi-Lo Western Live", "Live Hi-Lo"],

            // ["cbjl;cbjl_royalecashback", "Grand Royale Cashback", ""],
            // ["fbbl;fbbl_luckyball", "Mega Fire Blaze Lucky Ball", ""],
            // ["fbbl;fbbl_luckyballbr", "Mega Fire Blaze Lucky Ball Brasileiro", ""],
        ];
    }
}
