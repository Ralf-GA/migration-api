<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PcaProdController extends Controller
{
    public function migrate()
    {
        $pos = 1;
        $gameList = $this->gameList1();
        // $pos = 51;
        // $gameList = $this->gameList2();
        // $pos = 101;
        // $gameList = $this->gameList3();

        foreach ($gameList as $game) {
            $requestData[] = [
                'providerCode' => 'PCA',
                'providerName' => 'PLAYTECH CASINO',
                'gameCode' => $game[2],
                'gameName' => Str::lower($game[0]),
                'position' => $pos,
                'type' => Str::lower($game[1]),
                'rtp' => '0',
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

    public function delete()
    {
        $gameList = $this->gameList1();
        // $gameList = $this->gameList2();
        // $gameList = $this->gameList3();

        $gameList = array_merge($this->gameList1(), $this->gameList2(), $this->gameList3());

        foreach ($gameList as $game) {
            $requestData[] = [
                'provider_code' => 'PCA',
                'code' => $game[2]
            ];
        }

        dd($requestData);

        // foreach ($requestData as $data) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('DELETE_API_BEARER_TOKEN_PROD'),
        //         'Content-Type' => 'application/json'
        //     ])->delete(env('DELETE_GAME_API_PROD'), $data);
        //     // ])->post('dummyApi.com', $data);

        //     Log::info(json_encode([
        //         'request' => $data,
        //         'response' => $response->body()
        //         // 'response' => 'test logging'
        //     ]));
        // }
    }

    private function gameList1()
    {
        return [
            ["3 Card Brag", "Live 3 Card Brag", "3brgl;brag_3cardbrag"],
            ["Adventures Beyond Wonderland", "Adventures Beyond Wonderland", "abwl;abwl_wonderland"],
            ["All Bets Blackjack", "All Bets Blackjack", "abjl;abjl_allbetsblackjack"],
            ["American Roulette", "Live American Roulette", "rodzl;rodzl_doublezero"],
            ["Andar Bahar", "Andar Bahar", "abl;abl_andarbahar"],
            ["Arabic Roulette", "Live Roulette", "rol;rol_arabicroulette"],
            ["Auto Roulette", "Live Roulette", "rol;rol_slingshot"],
            ["Auto Roulette 2", "Live Roulette", "rol;rol_autoroulette2"],
            ["Baccarat", "Live Baccarat", "ubal;bal_baccarat1"],
            ["Baccarat Brasileira", "Mini Baccarat", "ubal;bal_speedbaccarat2"],
            ["Baccarat Brasileira NC", "Live No Commission Baccarat", "ubal;nc_bal_speedbaccarat2"],
            ["Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_baccarat1"],
            ["Baccarat Soirée", "Regular Blackjack", "ubal;nc_bal_soireebaccarat"],
            ["Baccarat Soirée NC", "Regular Blackjack", "ubal;bal_soireebaccarat"],
            ["Bet On Baccarat", "Betslip Baccarat", "bs_bal;bal_betslipbaccarat"],
            ["Bet On Dragon Tiger", "Bet On Dragon Tiger", "bs_dtl;bs_dtl_betondragontiger"],
            ["Bet On Poker", "Bet On Poker", "bs_pokl;bs_pokl_betonpoker"],
            ["Big Bad Wolf Live", "Big Bad Wolf Live", "bbwl;bbwl_bigbadwolf"],
            ["Blackjack 1", "Regular Blackjack", "bjl;blj_blackjack1"],
            ["Blackjack 10", "Regular Blackjack", "bjl;blj_blackjack10"],
            ["Blackjack 2", "Regular Blackjack", "bjl;blj_blackjack2"],
            ["Blackjack 3", "Regular Blackjack", "bjl;blj_blackjack3"],
            ["Blackjack 4", "Regular Blackjack", "bjl;blj_blackjack4"],
            ["Blackjack 5", "Regular Blackjack", "bjl;blj_blackjack5"],
            ["Blackjack 6", "Regular Blackjack", "bjl;blj_blackjack6"],
            ["Blackjack 7", "Regular Blackjack", "bjl;blj_blackjack7"],
            ["Blackjack 8", "Regular Blackjack", "bjl;blj_blackjack8"],
            ["Blackjack 9", "Regular Blackjack", "bjl;blj_blackjack9"],
            ["Blackjack Italiano 1", "Regular Blackjack", "bjl;bjl_italianobj1"],
            ["Blackjack Italiano 2", "Regular Blackjack", "bjl;bjl_italianobj2"],
            ["Blackjack Italiano VIP", "Regular Blackjack", "bjl;bjl_blackjackitalianovip"],
            ["Blackjack Soirée 1", "Regular Blackjack", "bjl;bjl_soireebj1"],
            ["Blackjack Soirée 2", "Regular Blackjack", "bjl;bjl_soireebj2"],
            ["Blackjack Soirée 3", "Regular Blackjack", "bjl;bjl_soireebj3"],
            ["Blackjack Soirée Gold 1", "Regular Blackjack", "bjl;bjl_persoireebj1"],
            ["Blackjack Soirée Gold 2", "Regular Blackjack", "bjl;bjl_persoireebj2"],
            ["Blackjack Soirée Gold 3", "Regular Blackjack", "bjl;bjl_persoireebj3"],
            ["Blackjack Soirée Gold 4", "Regular Blackjack", "bjl;bjl_persoireebj4"],
            ["Bucharest French Roulette", "Live French Roulette", "rofl;rofl_triumphrol"],
            ["Bucharest Roulette", "Live Roulette", "rol;rol_triumphrol"],
            ["Buffalo Blitz España", "Buffalo Blitz Slots", "bfbl;bfbl_espanaslots"],
            ["Buffalo Blitz Live Slots", "Buffalo Blitz Slots", "bfbl;bfbl_liveslots"],
            ["Casino Hold'em", "Live Casino Hold'em", "chel;chel_casinoholdem"],
            ["Colombia Blackjack", "Regular Blackjack", "bjl;bjl_colombiabj"],
            ["Deutsches Blackjack", "Regular Blackjack", "bjl;bjl_deutschbj"],
            ["Deutsches Roulette", "Live Roulette", "rol;rol_deutschrol"],
            ["Dragon Tiger", "Live Dragon Tiger", "dtl;dtl_dragontiger"],
            ["Emperor Baccarat", "Live Baccarat", "ubal;bal_emperorbaccarat"],
            ["Emperor Baccarat NC", "Live Baccarat", "ubal;nc_bal_emperorbaccarat"],
            ["Football Card Showdown Live", "Card Match Live", "cml;cml_cardmatch"],
        ];
    }

    private function gameList2()
    {
        return [
            ["Football French Roulette", "Football French Roulette", "frofl;rofl_livefootballroulette"],
            ["Football Roulette", "Football Roulette", "frol;rol_livefootballrol"],
            ["French Roulette", "Live French Roulette", "rofl;rofl_loungerol"],
            ["Gangnam Speed Baccarat", "Live Baccarat", "ubal;bal_speedbaccarat3"],
            ["Gangnam Speed Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_speedbaccarat3"],
            ["Grand Baccarat", "Live Baccarat", "ubal;bal_grandbaccarat"],
            ["Grand Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_grandbaccarat"],
            ["Grand Blackjack", "Regular Blackjack", "bjl;bjl_grandbjl"],
            ["Grand Royale Cashback", "Grand Royale Cashback", "cbjl;cbjl_royalecashback"],
            ["Greek Quantum Roulette", "Live Quantum Roulette", "qrol;qrol_quantumgreek"],
            ["Greek Roulette", "Live Roulette", "rol;rol_greekrol"],
            ["Hi-Lo", "Live Hilo", "hilol;hilo_hilo"],
            ["Hindi Roulette", "Live Roulette", "rol;rol_roulette1"],
            ["Italian Cashback Blackjack", "All Bets Blackjack", "cbjl;abjl_italianbj"],
            ["Jade Baccarat", "Baccarat", "ubal;bal_baccaratko"],
            ["Jade Baccarat NC", "Baccarat", "ubal;nc_bal_baccaratko"],
            ["Jade Blackjack", "Regular Blackjack", "bjl;bjl_blackjackko"],
            ["Jade Blackjack 2", "Regular Blackjack", "bjl;bjl_blackjack2ko"],
            ["Japanese Squeeze Baccarat", "Mini Baccarat", "ubal;bal_squeezebaccarat"],
            ["Japanese Squeeze Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_squeezebaccarat"],
            ["K-Pop Roulette Live", "K-Pop Roulette Live", "smplrol;smplrol_kpoprol"],
            ["Luckyball Roulette Live", "Live Roulette", "lbrol;frol_luckyballrol"],
            ["Majority Rules Speed Blackjack", "Majority Rules Speed Blackjack", "msbjl;msbjl_speedbj"],
            ["Mega Fire Blaze Blackjack Live", "Fire Blaze Blackjack", "fbbjl;fbbjl_fireblazebj"],
            ["Mega Fire Blaze Lucky Ball", "Mega Fire Blaze Lucky Ball", "fbbl;fbbl_luckyball"],
            ["Mega Fire Blaze Lucky Ball Brasileiro", "Mega Fire Blaze Lucky Ball Brasileiro", "fbbl;fbbl_luckyballbr"],
            ["Mega Fire Blaze Roulette Live", "Fire Blaze Roulette", "fbrol;fbrol_fireblazerol"],
            ["Mega Fire Blaze Ruleta España", "Fire Blaze Roulette", "fbrol;fbrol_espanafireblaze"],
            ["Nederlandstalige Roulette", "Live Roulette", "rol;rol_dutchroulette"],
            ["Prestige Roulette", "Live Roulette", "rol;rol_prestigerol"],
            ["Punto Banco Soirée Gold", "Baccarat", "ubal;bal_persoireebaccarat"],
            ["Quantum Blackjack Plus", "Quantum Blackjack", "qabjlp;qabjl_quantumbj"],
            ["Quantum Roulette Live", "Quantum Roulette", "qrol;rol_quantumroulette"],
            ["Quantum Ruleta España", "Live Quantum Roulette", "qrol;qrol_quantumrol2"],
            ["Roleta Brasileira", "Live Roulette", "rol;rol_brazilianrol"],
            ["Roulette", "Live Roulette", "rol;rol_loungerol"],
            ["Roulette Italiana", "Live Roulette", "rol;rol_rouletteitaliana"],
            ["Royale Blackjack 1", "Regular Blackjack", "bjl;bjl_royalebj1"],
            ["Royale Blackjack 2", "Regular Blackjack", "bjl;bjl_royale2"],
            ["Royale Blackjack 3", "Regular Blackjack", "bjl;bjl_royalebj3"],
            ["Royale Blackjack 4", "Regular Blackjack", "bjl;bjl_royale4"],
            ["Ru Yi Speed Baccarat NC", "No Commission Baccarat 7 seat Baccarat", "ubal;nc_7bal_speedbaccarat"],
            ["Ruleta Automática Cuántica", "Live Quantum Roulette", "qrol;qrol_autoruleta2"],
            ["Ruyi 如意 French Roulette", "Live French Roulette", "rofl;rofl_ruyiroulette"],
            ["Ruyi 如意 Roulette", "Live Roulette", "rol;rol_ruyiroulette"],
            ["Sette E Mezzo", "7 e Mezzo", "7eml;7eml_7emezzo"],
            ["SicBo Deluxe", "Sic Bo Deluxe", "sbdl;sbdl_deluxesicbo"],
            ["Slingshot Ruleta España", "Live Roulette", "rol;rol_ruletaslingshot2"],
            ["Soho All Bets Blackjack", "All Bets Blackjack", "abjl;abjl_allbetsblackjack2"],
            ["Soirée Privée Blackjack", "Regular Blackjack", "bjl;bjl_soireepriveebj"],
        ];
    }

    private function gameList3()
    {
        return [
            ["Speed 6 Scanner Baccarat", "Live Baccarat", "ubal;bal_goldenbac1"],
            ["Speed 6 Scanner Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_goldenbac1"],
            ["Speed Auto Roulette", "Live Roulette", "rol;rol_primeslingshot"],
            ["Speed Baccarat", "Live Baccarat", "ubal;bal_minibaccarat"],
            ["Speed Baccarat Korean", "Mini Baccarat", "ubal;bal_speedbaccarat1"],
            ["Speed Baccarat Korean NC", "Live No Commission Baccarat", "ubal;nc_bal_speedbaccarat1"],
            ["Speed Baccarat NC", "Live No Commission Baccarat", "ubal;nc_bal_minibaccarat"],
            ["Speed Baccarat Ru Yi ", "7 Seat Baccarat", "ubal;7bal_speedbaccarat"],
            ["Speed Roulette", "Live Roulette", "rol;rol_speedrol"],
            ["Speed Sic Bo", "Sic Bo", "sbl;sbl_sicbo"],
            ["Spin a Win", "Live Spin a Win", "swl;swl_spinawin"],
            ["Spin A Win Wild Brasileiro", "Spin a Win Wild Live", "swle;swle_spinawinwild"],
            ["Spread Bet Roulette", "Spread Bet Roulette", "sprol;sprol_perspreadbetrol"],
            ["Teen Patti Live", "Teen Patti", "tpl;tpl_teenpatti"],
            ["The Greatest Cards Show Live", "The Greatest Card Show", "tgcsl;tgcsl_cardshow"],
            ["Turkish Roulette", "Live Roulette", "rol;rol_turkishrol"],
            ["Unlimited Blackjack", "Live Unlimited Blackjack", "ubjl;ubjl_unlimitedbj"],
            ["x1000 Quantum Roulette", "Quantum Double Zero Roulette", "qrodzl;qrodzl_quantumita"],
            ["Sticky Bandits Roulette Live", "Sticky Bandits Roulette Live", "sbrol;sbrol_stickybanditsrol"],
        ];
    }
}
