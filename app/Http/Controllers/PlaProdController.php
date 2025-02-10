<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PlaProdController extends Controller
{
    public function migrate()
    {
        $pos = 1;
        $gameList = $this->gameList1();
        // $pos = 51;
        // $gameList = $this->gameList2();
        // $pos = 101;
        // $gameList = $this->gameList3();
        // $pos = 151;
        // $gameList = $this->gameList4();
        // $pos = 201;
        // $gameList = $this->gameList5();
        // $pos = 251;
        // $gameList = $this->gameList6();
        // $pos = 301;
        // $gameList = $this->gameList7();

        foreach ($gameList as $game) {
            $type = 'slot';
            if ($game[2] != 'Slot Machines' && $game[2] != 'Slot w/ Buy Feature')
                $type = 'arcade';

            $requestData[] = [
                'providerCode' => 'PLA',
                'providerName' => 'PLAYTECH SLOTS',
                'gameCode' => $game[1],
                'gameName' => $game[0],
                'position' => $pos,
                'type' => $type,
                'rtp' => $game[3],
                'imageUrl' => '-',
                'imageAlt' => $game[0],
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

        dd('done');
    }

    public function delete()
    {
        $gameList = $this->gameList1();
        // $gameList = $this->gameList2();
        // $gameList = $this->gameList3();
        // $gameList = $this->gameList4();
        // $gameList = $this->gameList5();
        // $gameList = $this->gameList6();
        // $gameList = $this->gameList7();
        // $gameList = $this->recentlyAddedGames();

        // $gameList = array_merge($this->gameList1(), $this->gameList2(), $this->gameList3(), $this->gameList4(), $this->gameList5(), $this->gameList6(), $this->gameList7(), $this->recentlyAddedGames());

        foreach ($gameList as $game) {
            $requestData[] = [
                'provider_code' => 'PLA',
                'code' => $game[1]
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
            ["1000 Diamond Bet Roulette", "db1000ro", "Table & Card Games", "96.19"],
            ["101 Roulette", "ro101", "Table & Card Games", "0"],
            ["28 Mansions", "gpas_28dman_pop", "Slot Machines", "96.19"],
            ["3 Card Brag", "3cb", "Table & Card Games", "0"],
            ["7 e mezzo", "sem", "Table & Card Games", "99.54"],
            ["A Night Out", "hb", "Slot Machines", "97.06"],
            ["Absolutely Mammoth!™", "gpas_amammoth_pop", "Slot Machines", "96.49"],
            ["Aces and Faces™ Multi-Hand", "af_mh", "Video Poker", "99.26"],
            ["Aces and Faces™ Multi-Hand", "af_mh1", "Video Poker", "99.26"],
            ["Aces and Faces™ Multi-Hand", "af_mh2", "Video Poker", "99.26"],
            ["Aces and Faces™ Multi-Hand", "af_mh3", "Video Poker", "99.26"],
            ["Aces and Faces™ Multi-Hand", "af_mh4", "Video Poker", "99.26"],
            ["Age of Egypt", "agoeg", "Slot Machines", "97.05"],
            ["Alohawaii: Cash Collect™", "gpas_alohacc_pop", "Slot Machines", "95.87"],
            ["Anaconda Uncoiled™", "gpas_auncoil_pop", "Slot Machines", "95.94"],
            ["Anaconda Wild 2™", "gpas_awild2_pop", "Slot Machines", "96.47"],
            ["Anaconda Wild™", "anwild", "Slot Machines", "95.48"],
            ["Archer", "gpas_archer_pop", "Slot Machines", "96.77"],
            ["Arowanas Luck", "gpas_aluck_pop", "Slot Machines", "97.52"],
            ["Asian Fantasy", "asfa", "Slot Machines", "96.02"],
            ["Atlantis Cash Collect™", "gpas_ccskingofa_pop", "Slot Machines", "96.25"],
            ["Aztec Expedition™ Thundershots™", "gpas_aexpedition_pop", "Slot Machines", "95.50"],
            ["Azteca Bonus Lines™", "gpas_azboli_pop", "Slot Machines", "94.93"],
            ["Baccarat", "ba", "Table & Card Games", "0"],
            ["Bai Shi", "bs", "Slot Machines", "95.99"],
            ["Bee Frenzy Thundershots™", "gpas_bfrenzy_pop", "Slot Machines", "96.14"],
            ["Bermuda Triangle", "bt", "Slot Machines", "96.73"],
            ["Berry Berry Bonanza", "gpas_berrybon_pop", "Slot Machines", "95.99"],
            ["Better Wilds™", "gpas_betwilds_pop", "Slot Machines", "96.42"],
            ["Big Shots™", "bigsh", "Slot Machines", "96.10"],
            ["Blackjack Mini", "mbj", "Table & Card Games", "99.58"],
            ["Blackjack Surrender", "bjsd2", "Table & Card Games", "99.66"],
            ["Blackjack Switch", "bjs", "Table & Card Games", "99.87"],
            ["Blazing Bells™", "gpas_bbells_pop", "Slot Machines", "96.37"],
            ["Blue Wizard", "gpas_bwizard_pop", "Slot Machines", "96.50"],
            ["Bonus Bears", "bob", "Slot Machines", "95.17"],
            ["Bonus Train Bandits", "gpas_btbandit_pop", "Slot Machines", "96.12"],
            ["Book of Kings", "gpas_boking_pop", "Slot Machines", "96.64"],
            ["Breakout Bob", "gpas_bbob_pop", "Slot Machines", "96.52"],
            ["Buccaneer Blast", "gpas_pblast_pop", "Slot Machines", "96.15"],
            ["Buckle Up", "bup", "Slot Machines", "95.80"],
            ["Buffalo Blitz", "gpas_bblitz_pop", "Slot Machines", "95.96"],
            ["Buffalo Blitz II™", "gpas_bblitz2_pop", "Slot Machines", "95.96"],
            ["Buster Blackjack", "bjbu", "Table & Card Games", "99.58"],
            ["Caishen Ways", "gpas_cways_pop", "Slot Machines", "96.91"],
            ["Captain's Treasure", "gpas_captres_pop", "Slot Machines", "97.06"],
            ["Cascading Cave", "gpas_ccave_pop", "Slot Machines", "95.83"],
            ["Cash It™", "crit", "Arcade", "95.99"],
            ["Cashback Blackjack", "bjcb", "Table & Card Games", "99.55"],
            ["Casino Charms", "gpas_cascharms_pop", "Slot Machines", "96.06"],
        ];
    }

    private function gameList2()
    {
        return [
            ["Casino Hold'Em", "cheaa", "Table & Card Games", "0"],
            ["Cat Queen", "catqc", "Slot Machines", "93.60"],
            ["Chaoji 888", "chao", "Slot Machines", "96.47"],
            ["Chili Eruption Thundershots™ ", "gpas_ceruption_pop", "Slot Machines", "96.17"],
            ["Chilli Xtreme™", "gpas_cxtreme_pop", "Slot Machines", "95.23"],
            ["Chinese Kitchen", "cm", "Slot Machines", "96.92"],
            ["Circus Launch™", "circ", "Arcade", "95.99"],
            ["Classic Roulette", "ro", "Table & Card Games", "97.30"],
            ["Crazy 7", "c7", "Slot Machines", "96.98"],
            ["Curse of Anubis™", "gpas_soanubis_pop", "Slot Machines", "96.01"],
            ["Da Vinci’s Vault", "dvncv", "Slot Machines", "0"],
            ["Desert Treasure", "mobdt", "Slot Machines", "97.05"],
            ["Deuces Wild™ Multi-Hand", "dw_mh", "Table & Card Games", "98.91"],
            ["Devil Wilds™", "gpas_devwilds_pop", "Slot Machines", "95.50"],
            ["Diamond Bet Roulette", "dbro", "Table & Card Games", "95.39"],
            ["Diamond Rise™", "gpas_drise_pop", "Slot Machines", "95.96"],
            ["Divine 9™", "gpas_divine_pop", "Slot Machines", "95.90"],
            ["Dolphin Reef", "gpas_dreef_pop", "Slot Machines", "95.23"],
            ["Dragon Bond", "gpas_dbond_pop", "Slot Machines", "96.85"],
            ["Dragon Champions", "drgch", "Slot Machines", "95.12"],
            ["Dragon Chi", "gpas_dragonchi_pop", "Slot Machines", "96.87"],
            ["Dragon Spark", "gpas_dsparks_pop", "Slot Machines", "96.31"],
            ["Dragons Hall™", "gpas_dhall_pop", "Slot Machines", "95.35"],
            ["Easter Surprise", "eas", "Slot Machines", "97.05"],
            ["Egyptian Emeralds™", "gpas_eemeralds_pop", "Slot Machines", "96.36"],
            ["Eliminators", "gpas_eliminators_pop", "Slot Machines", "95.76"],
            ["Epic Ape", "gpas_eape_pop", "Slot Machines", "95.96"],
            ["Eternal Lady", "gpas_elady_pop", "Slot Machines", "96.50"],
            ["Eye of Anubis", "gpas_sscarab_pop", "Slot Machines", "95.76"],
            ["Fairground Fortunes Ghost Train", "ashfgf", "Slot Machines", "94.06"],
            ["Fat Choy Choy Sun™", "gpas_fatchoy_pop", "Slot Machines", "96.62"],
            ["Fei Long Zai Tian", "gpas_flztian_pop", "Slot Machines", "96.03"],
            ["Feng Kuang Ma Jiang", "fkmj", "Slot Machines", "96.06"],
            ["Fire 4: Cash Collect Quattro™ A1", "gpas_f4ccd_pop", "Slot Machines", "94.80"],
            ["Fire Blaze Golden: Buccaneer Bells™", "gpas_fbgbb_pop", "Slot Machines", "96.48"],
            ["Fire Blaze Golden™ Amazing Factory™", "gpas_afactory_pop", "Slot Machines", "96.50"],
            ["Fire Blaze Quattro: Celtic Charm™", "gpas_qccharm_pop", "Slot Machines", "95.83"],
            ["Fire Blaze: Adventure Trail", "gpas_atrail_pop", "Slot Machines", "96.64"],
            ["Fire Blaze: Blue Wizard™ Megaways™", "gpas_mgbwizard_pop", "Slot Machines", "96.47"],
            ["Fire Blaze: Green Wizard™", "gpas_gwizard_pop", "Slot Machines", "95.90"],
            ["Fire Blaze: Jinns Moon", "gpas_jmoon_pop", "Slot Machines", "96.58"],
            ["Fire Blaze: Pearls Pearls Pearls", "gpas_pppearls_pop", "Slot Machines", "96.50"],
            ["Fire Blaze: Red Wizard", "gpas_rwizard_pop", "Slot Machines", "96.49"],
            ["Fire Blaze: River Empress", "gpas_rempress_pop", "Slot Machines", "96.50"],
            ["Fire Blaze: Sisters Gift", "gpas_sgift_pop", "Slot Machines", "96.47"],
            ["Fire Blaze: Toltec Blocks™", "gpas_qctoblo_pop", "Slot Machines", "95.92"],
            ["Fire Blaze™ Golden: Tundra Wolf™", "gpas_twolf_pop", "Slot Machines", "96.46"],
            ["Fire Blaze™: Fire Fighter™", "gpas_ffighter_pop", "Slot Machines", "95.92"],
            ["FISH! Shoot for Cash", "fishshr", "Arcade", "95.80"],
            ["Fishin' Bonanza™", "gpas_ffever_pop", "Slot Machines", "96.51"],
        ];
    }

    private function gameList3()
    {
        return [
            ["Football Rules!", "fbr", "Slot Machines", "97.06"],
            ["Football! Cash Collect™", "gpas_focashco_pop", "Slot Machines", "94.91"],
            ["Forest Prince™", "gpas_fprince_pop", "Slot Machines", "95.84"],
            ["Fortune Day", "fday", "Slot Machines", "97.51"],
            ["Fortune Lions", "frtln", "Slot Machines", "96.63"],
            ["Fortunes of the Fox (Foxy Fortune)", "fxf", "Slot Machines", "95.11"],
            ["Free Chip Blackjack", "fcbj", "Table & Card Games", "99.23"],
            ["Frogs Gift", "gpas_fgift_pop", "Slot Machines", "96.76"],
            ["Full Moon: White Panda™", "gpas_wpanda_pop", "Slot Machines", "95.90"],
            ["Full Moon: Wild Track™", "gpas_wtrack_pop", "Slot Machines", "95.93"],
            ["Funky Monkey", "fm", "Slot Machines", "97.15"],
            ["Gaelic Luck", "popc", "Slot Machines", "97.06"],
            ["Galactic Streak™", "galst", "Slot Machines", "95.95"],
            ["Geisha Story", "ges", "Slot Machines", "95.48"],
            ["Gem Heat", "gemheat", "Slot Machines", "92.05"],
            ["Gem Queen", "gemq", "Slot Machines", "96.06"],
            ["Glorious Guardians™", "gpas_gguardians_pop", "Slot Machines", "96.49"],
            ["Gold Hit: Dragon Bonanza™", "gpas_goldhit3_pop", "Slot Machines", "95.50"],
            ["Gold Hit: Shrine Of Anubis™", "gpas_goldhit2_pop", "Slot Machines", "95.80"],
            ["Gold Hit™: O’Reilly’s Riches", "gpas_bcash_pop", "Slot Machines", "95.21"],
            ["Gold Pile Tigers Pride", "gpas_tfortune_pop", "Slot Machines", "96.47"],
            ["Gold Pile: New Years Gold", "gpas_gpnyg_pop", "Slot Machines", "96.46"],
            ["Gold Pile: Orangutan!", "gpas_gporang_pop", "Slot Machines", "96.45"],
            ["Gold Pile: Toltec Treasure", "gpas_ttreasure_pop", "Slot Machines", "96.46"],
            ["Golden Macaque", "gpas_gmacaque_pop", "Slot Machines", "96.73"],
            ["Golden Tour", "gpas_goltour_pop", "Slot Machines", "97.71"],
            ["Golden Ways", "gpas_buddhaways_pop", "Slot Machines", "96.92"],
            ["Grand Junction : Golden Guns™", "gpas_ggun_pop", "Slot Machines", "96.41"],
            ["Grand Junction: Mountain Express™", "gpas_mountexp_pop", "Slot Machines", "96.51"],
            ["Great Blue™", "gpas_gblue_pop", "Slot Machines", "96.03"],
            ["Hainan Ice", "gpas_hice_pop", "Slot Machines", "96.82"],
            ["Halloween Fortune", "hlf", "Slot Machines", "97.06"],
            ["Halloween Fortune II", "hlf2", "Slot Machines", "94.99"],
            ["Haunted House", "hh", "Slot Machines", "96.71"],
            ["Heads-Up Hold'em", "huh", "Table & Card Games", "97.64"],
            ["Heart of the Frontier", "ashhof", "Slot Machines", "96.09"],
            ["Heavenly Ruler", "heavru", "Slot Machines", "96.32"],
            ["Heroes Arrow™", "gpas_harrow_pop", "Slot Machines", "96.38"],
            ["Hi-Lo Premium™", "hilop", "Video Poker", "97.50"],
            ["Highway Kings", "gpas_highkings_pop", "Slot Machines", "97.05"],
            ["Hit Bar: Gold™", "gpas_hitbargl_pop", "Slot Machines", "95.61"],
            ["Hit Bar™", "gpas_fmhitbar_pop", "Slot Machines", "96.00"],
            ["Hologram Wilds", "hwilds", "Slot Machines", "95.97"],
            ["Hot Gems™", "gpas_hgems_pop", "Slot Machines", "95.99"],
            ["Hot Gems™ Xtreme", "gpas_hgextreme_pop", "Slot Machines", "95.81"],
            ["Hot Gems™ Xtreme Scratch", "gpas_hgextremeiw_pop", "Scratch Cards", "95.00"],
            ["Hot KTV", "hotktv", "Slot Machines", "95.56"],
            ["Ice Cave", "gpas_icave_pop", "Slot Machines", "0"],
            ["Irish Luck", "irl", "Slot Machines", "94.25"],
            ["Jacks or Better", "po", "Video Poker", "99.54"],
        ];
    }

    private function gameList4()
    {
        return [
            ["Jacks or Better Multi-Hand™", "jb_mh", "Video Poker", "97.30"],
            ["Jane Jones in Book of Kings 2", "gpas_nalight_pop", "Slot Machines", "96.50"],
            ["Jin Qian Wa", "jqw", "Slot Machines", "96.96"],
            ["Jinfu Long", "gpas_jflong_pop", "Slot Machines", "96.51"],
            ["JinfuXingyun", "gpas_xjinfu_pop", "Slot Machines", "96.49"],
            ["Joker Poker", "jp", "Table & Card Games", "98.60"],
            ["Joker Rush™", "gpas_jrush_pop", "Slot Machines", "96.00"],
            ["Juego De La Oca", "jdlo", "Slot Machines", "95.08"],
            ["Jungle Giants", "jnglg", "Slot Machines", "95.06"],
            ["Jurassic Island 2™", "gpas_jisland2_pop", "Slot Machines", "95.70"],
            ["Koi Harmony™", "gpas_koihar_pop", "Slot Machines", "96.47"],
            ["Legacy of the Wild", "gpas_lotwild_pop", "Slot Machines", "96.10"],
            ["Legacy of the Wild 2™", "gpas_lotwild2_pop", "Slot Machines", "96.36"],
            ["Legend of Hydra™", "gpas_hydra_pop", "Slot Machines", "96.56"],
            ["Lie Yan Zuan Shi™", "ght_a", "Slot Machines", "94.99"],
            ["Lock & Hit: Red Knight™", "gpas_monreelsa1_pop", "Slot Machines", "95.47"],
            ["Lockdown Loot™", " gpas_pbreak_pop", "Slot Machines", "95.63"],
            ["Long Long Long", "longlong", "Slot Machines", "96.31"],
            ["Lotto Madness", "lm", "Slot Machines", "97.06"],
            ["Lovefool™", "gpas_scupid_pop", "Slot Machines", "96.32"],
            ["Lucky Emeralds™", "gpas_lemeralds_pop", "Slot Machines", "95.74"],
            ["Lucky Lucky Blackjack", "bjll", "Table & Card Games", "99.58"],
            ["Luminous Life", "lumli", "Slot Machines", "94.44"],
            ["Magical Stacks", "mgstk", "Slot Machines", "95.03"],
            ["Maji Wilds", "mwilds", "Slot Machines", "95.25"],
            ["Mayan Blocks™", "gpas_mblocks_pop", "Slot Machines", "95.36"],
            ["Mega Fire Blaze: Emperor of Rome™", "gpas_eofrome_pop", "Slot Machines", "94.91"],
            ["Mega Fire Blaze: Khonsu God of Moon™", "gpas_kgomoon_pop", "Slot Machines", "96.49"],
            ["Mega Fire Blaze: Piggies And The Bank™", "gpas_engage_pop", "Slot Machines", "95.38"],
            ["Mega Fire Blaze™ Roulette", "mfbro", "Table & Card Games", "97.31"],
            ["Mega Fire Blaze™ Wild Pistolero™", "gpas_wpisto_pop", "Slot Machines", "95.96"],
            ["Mega Fire Blaze™: Big Circus!™", "gpas_bcircus_pop", "Slot Machines", "96.37"],
            ["Mega Fire Blaze™: Legacy of the Tiger™", "gpas_lottiger_pop", "Slot Machines", "96.59"],
            ["Midnight Wilds", "gpas_mwilds_pop", "Slot Machines", "95.00"],
            ["Mighty Hat : Lamp of Gold™", "gpas_gwish_pop", "Slot Machines", "96.24"],
            ["Mighty Hat : Mine O'Mine™", "gpas_grush_pop", "Slot Machines", "96.24"],
            ["Mighty Hat : Mystic Tales™", "gpas_mforest_pop", "Slot Machines", "95.66"],
            ["Mini Roulette", "mro", "Table & Card Games", "96.15"],
            ["Miss Fortune", "mfrt", "Slot Machines", "95.03"],
            ["Mobile Blackjack", "mobbj", "Table & Card Games", "99.58"],
            ["Mobile Roulette", "mobro", "Table & Card Games", "97.30"],
            ["Monkey and Rat™", "gpas_marat_pop", "Slot Machines", "97.52"],
            ["Monster Multipliers™", "gpas_sking_pop", "Slot Machines", "95.70"],
            ["Mr. Cashback", "mcb", "Slot Machines", "95.37"],
            ["Murder Mystery", "murder", "Slot Machines", "96.53"],
            ["Neptune’s™ Kingdom", "nk", "Slot Machines", "97.19"],
            ["New Year's Bonanza", "gpas_nyslot_pop", "Slot Machines", "95.99"],
            ["Ni Shu Shen Me", "gpas_nsshen_pop", "Slot Machines", "96.86"],
            ["Ox Riches", "gpas_strongox_pop", "Slot Machines", "96.93"],
            ["Panda Luck", "gpas_pluck_pop", "Slot Machines", "96.91"],
        ];
    }

    private function gameList5()
    {
        return [
            ["Panther Moon", "pmn", "Slot Machines", "95.17"],
            ["Panther Pays", "gpas_panthpays_pop", "Slot Machines", "96.26"],
            ["Penguin Vacation", "pgv", "Slot Machines", "94.25"],
            ["Penny Roulette", "prol", "Table & Card Games", "97.30"],
            ["Perfect Blackjack", "pfbj_mh5", "Table & Card Games", "99.58"],
            ["Pharaoh's Daughter", "gpas_scqueen_pop", "Slot Machines", "96.50"],
            ["Pharaoh's Secrets", "pst", "Slot Machines", "94.00"],
            ["Pigeons From Space", "gpas_pigeonfs_pop", "Slot Machines", "95.97"],
            ["Piggies and the Wolf", "paw", "Slot Machines", "92.10"],
            ["Pinball Roulette", "pbro", "Table & Card Games", "97.30"],
            ["Plenty O'Fortune™ ", "gpas_pffortune_pop", "Slot Machines", "91.95"],
            ["Power Zones™: Ishtar", "gpas_ishtar_pop", "Slot Machines", "95.52"],
            ["Power Zones™: Thunder Birds", "gpas_tbirds_pop", "Slot Machines", "96.42"],
            ["Premium American Roulette", "rodz_g", "Table & Card Games", "94.74"],
            ["Premium Blackjack", "bjto", "Table & Card Games", "99.58"],
            ["Premium Blackjack Single Hand", "bjto_sh", "Table & Card Games", "99.58"],
            ["Premium European Roulette", "ro_g", "Table & Card Games", "97.30"],
            ["Premium French Roulette", "frr_g", "Table & Card Games", "97.30"],
            ["Pumpkin Bonanza", "gpas_pumpkinb_pop", "Slot Machines", "95.51"],
            ["Pyramid Valley™: Power Zones™", "gpas_pstrike_pop", "Slot Machines", "94.39"],
            ["Qin's Empire : Caishen's Temple", "gpas_ctemple_pop", "Slot Machines", "95.36"],
            ["Qin's Empire : Celestial Guardians™", "gpas_cguard_pop", "Slot Machines", "96.46"],
            ["Quantum™ Roulette Instant Play", "qro", "Table & Card Games", "96.45"],
            ["Queen of Wands", "qnw", "Slot Machines", "97.30"],
            ["Quest West", "gpas_mquest_pop", "Slot Machines", "96.96"],
            ["Ready To Blow: Thundershots™", "gpas_retoblow_pop", "Slot Machines", "95.61"],
            ["Record Riches", "gpas_rriches_pop", "Slot Machines", "97.45"],
            ["Retro Rush", "gpas_rrider_pop", "Slot Machines", "96.10"],
            ["Ri Ri Jin Cai", "ririjc", "Slot Machines", "97.51"],
            ["Rogues Draw™", "gpas_rogue_pop", "Slot Machines", "96.00"],
            ["Rome & Glory", "rng2", "Slot Machines", "94.36"],
            ["Roulette Deluxe", "presrol", "Table & Card Games", "97.30"],
            ["Roulette Mini", "mro_g", "Table & Card Games", "97.30"],
            ["Royal Respin Deluxe", "rrd", "Slot Machines", "95.11"],
            ["Sacred Stones", "scrdstns", "Slot Machines", "96.15"],
            ["Safari Heat", "gpas_safarih_pop", "Slot Machines", "96.15"],
            ["Sahara Riches MegaWays™: Cash Collect™", "gpas_mgccsahara_pop", "Slot Machines", "94.88"],
            ["Sahara Riches™: Cash Collect™", "gpas_ccsahara_pop", "Slot Machines", "95.67"],
            ["Sakura Fortune™powered by Rarestone™", "gpas_sfortune_pop", "Slot Machines", "96.53"],
            ["Santa Surprise", "ssp", "Slot Machines", "97.05"],
            ["Savage Jungle", "gpas_sjungle_pop", "Slot Machines", "96.54"],
            ["Secrets of the Amazon", "samz", "Slot Machines", "95.30"],
            ["Sherlock Mystery", "shmst", "Slot Machines", "94.09"],
            ["Shield of Rome™ ", "gpas_sorome_pop", "Slot Machines", "95.20"],
            ["Sinbad's Golden Voyage", "gpas_sgvoyage_pop", "Slot Machines", "97.00"],
            ["Si Xiang", "sx", "Slot Machines", "96.00"],
            ["Silent Samurai", "sis", "Slot Machines", "95.77"],
            ["Silver Bullet", "sib", "Slot Machines", "95.44"],
            ["Silver Bullet Bandit: Cash Collect™", "gpas_sbullet_pop", "Slot Machines", "95.44"],
            ["Sky Queen", "gpas_squeen_pop", "Slot Machines", "96.58"],
        ];
    }

    private function gameList6()
    {
        return [
            ["Sorcerer's Guild of Magic", "gpas_sgomagic_pop", "Slot Machines", "96.09"],
            ["Space Hunter: Shoot for Cash™", "shsfc", "Arcade", "96.50"],
            ["Spin A win", "lwh", "Table & Card Games", "97.50"],
            ["Spread-Bet Roulette", "sbro", "Table & Card Games", "97.30"],
            ["Stallion Strike", "gpas_sstrike_pop", "Slot Machines", "96.27"],
            ["Starmada Exiles", "gpas_sexiles_pop", "Slot Machines", "96.15"],
            ["Stars Ablaze", "gpas_starsablaze_pop", "Slot Machines", "95.50"],
            ["Stars Awakening", "strsawk", "Slot Machines", "95.93"],
            ["Super Roulette", "supro", "Table & Card Games", "95.60"],
            ["Thai Paradise", "tpd2", "Slot Machines", "94.36"],
            ["The Riches of Don Quixote™", "donq", "Slot Machines", "94.99"],
            ["Tiger Claw", "tigc", "Slot Machines", "95.96"],
            ["Tiger Stacks", "gpas_tstacks_pop", "Slot Machines", "96.52"],
            ["Tiger Turtle Dragon Phoenix", "gpas_tigertdp_pop", "Slot Machines", "96.94"],
            ["Tip Top Totems", "gpas_tttotems_pop", "Slot Machines", "96.56"],
            ["Toads Gift", "gpas_tgift_pop", "Slot Machines", "96.76"],
            ["Treasures of the Lamps", "totl", "Slot Machines", "95.15"],
            ["Triple Monkey", "trpmnk", "Slot Machines", "97.00"],
            ["Triple Stop Mermaids Find", "gpas_merfind_pop", "Slot Machines", "95.48"],
            ["True Love", "trl", "Slot Machines", "94.35"],
            ["Tsai Shen's Gift", "gpas_tsgift_pop", "Slot Machines", "96.50"],
            ["Ugga Bugga", "ub", "Slot Machines", "98.74"],
            ["Vacation Station", "er", "Slot Machines", "96.93"],
            ["Vacation Station Deluxe", "vcstd", "Slot Machines", "96.93"],
            ["Vampire Princess of Darkness", "gpas_vampirep_pop", "Slot Machines", "95.50"],
            ["Vegas Blackjack!", "bj65", "Table & Card Games", "98.34"],
            ["Ways of the Phoenix™", "wotp", "Slot Machines", "96.00"],
            ["Wheels of Flame™", "gpas_wofire1_pop", "Slot Machines", "95.51"],
            ["White King", "whk", "Slot Machines", "90.05"],
            ["White King II™", "whk2", "Slot Machines", "91.40"],
            ["Wild Lava", "gpas_wlava_pop", "Slot Machines", "96.47"],
            ["Wild Lava Scratch", "gpas_wlavaiw_pop", "Scratch Cards", "95.00"],
            ["Wild Linx™", "gpas_wlinx_pop", "Slot Machines", "96.49"],
            ["Wild West Wilds", "gpas_wwd_pop", "Slot Machines", "96.14"],
            ["Witches: Cash Collect™", "gpas_cchfortune_pop", "Slot Machines", "95.67"],
            ["WOLVES WOLVES WOLVES", "www", "Slot Machines", "94.08"],
            ["Wu Long ™ ", "wlg", "Slot Machines", "94.13"],
            ["Wushu Punch™", "gpas_wpunch_pop", "Slot Machines", "95.99"],
            ["Yu Tu Jin Cai Cash Collect™", "gpas_rabbitcash_pop", "Slot Machines", "94.91"],
            ["Yun Cong Long", "yclong", "Slot Machines", "95.99"],
            ["Zhao Cai Jin Bao", "zcjb", "Slot Machines", "95.99"],
            ["Zhao Cai Jin Bao 2", "gpas_zcjbao2_pop", "Slot Machines", "95.26"],
            ["Zhao Cai Tong Zi", "zctz", "Slot Machines", "97.01"],
            ["Zodiac Charms", "gpas_zcharms_pop", "Slot Machines", "96.46"],
            ["Azteca: Сash Сollect™", "gpas_aztecw_pop", "Slot Machines", "95.43"],
            ["Rich Roll: Lust for Gold!™", "gpas_rrlustforg_pop", "Slot Machines", "94.90"],
            ["Lucky Gift: Cash Collect™", "gpas_lgcc_pop", "Slot Machines", "95.59"],
            ["Mega Fire Blaze: 3 Wizards™", "gpas_3wizards_pop", "Slot Machines", "0"],
            ["Gold Hit: O'Reilly's Charms™ FB", "gpas_orwifefb_pop", "Slot Machines", "0"],
            ["The Great Genie™", "gpas_gegenie_pop", "Slot Machines", "95.44"],
        ];
    }

    private function gameList7()
    {
        return [
            ["Veils Of Venice™", "gpas_venemasks_pop", "Slot Machines", "0"],
            ["OINK OINK OINK™", "gpas_oink_pop", "Slot Machines", "95.91"],
            ["Macabra Linx™", "gpas_mabralinx_pop", "Slot Machines", "0"],
            ["Leprechaun's Luck - Cash Collect™ MEGAWAYS™", "gpas_lluckmcc_pop", "Slot Machines", "95.38"],
            ["Panther Moon: Bonus Lines™", "gpas_pmoonbl_pop", "Slot Machines", "95.54"],
            ["Mega Fire Blaze: Dwarves and Goblins™", "gpas_mfbdag_pop", "Slot Machines", "95.71"],
            ["Gold Trio™", "gpas_gtfb_pop", "Slot Machines", "95.90"],
            ["Feng Shui Flip™", "gpas_fsflip_pop", "Slot Machines", "95.48"],
            ["Elephant Riches™", "gpas_elphrich_pop", "Slot Machines", "0"],
            ["Wolves! Cash Collect & Link™", "gpas_wolcc_pop", "Slot Machines", "95.57"],
            ["Candy Roll™", "gpas_sweroll_pop", "Slot Machines", "0"],
        ];
    }

    private function recentlyAddedGames()
    {
        return [
            ["Epic Fish Adventure", "pop_4cb213b5_qsp", "Slot Machines", "0"],
            ["Sakura Fortune Epic Bloom", "pop_31a48f83_qsp", "Slot Machines", "0"],
            ["Age of the Gods: Ruler of the Sky", "gpas_aogrotsk_pop", "POP Slots", "0"],
            ["Goood Heavens", "gpas_gdhvns_pop", "POP Slots", "0"]
        ];
    }
}
