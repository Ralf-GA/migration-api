<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class PlaProdV2Controller extends Controller
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
        // $pos = 351;
        // $gameList = $this->gameList8();

        foreach ($gameList as $game) {
            $type = 'slot';
            if (in_array($game[2], ['POP Slots', 'Video Slots', 'Slot Machines']) === false)
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

    public function gameList1()
    {
        return [
            ['Gummy Giga Match','pop_fe5b5bb8_rbp','POP Slots','96.32'],
            ['Immortal Ways Lady Moon','pop_b0067ed7_rbp','POP Slots','96.28'],
            ['Diamond Explosion 7s','pop_eacf1531_rbp','POP Slots','96.82'],
            ['Go High Panda','pop_208f7707_rbp','POP Slots','96.37'],
            ['Shields of Lambda','pop_c8bbebef_qsp','POP Slots','96.13'],
            ['Temple of paw','pop_d2c001cd_qsp','POP Slots','96.01'],
            ['Epic Fish adventure 96','pop_ed3ed0a1_qsp','POP Slots','96.07'],
            ['Sakura Fortune Epic Bloom 96','pop_f6d36d30_qsp','POP Slots','96.06'],
            ['Lights of luck','gpas_loluck_pop','POP Slots','95.90'],
            ['Goood Heavens','gpas_gdhvns_pop','POP Slots','95.91'],
            ['Breach the Vault','gpas_bvault_pop','POP Slots','95.51'],
            ['Candy Roll','gpas_sweroll_pop','POP Slots','95.43'],
            ['Circuit Shock','gpas_cish_pop','POP Slots','95.77'],
            ['Diamond Match Deluxe','gpas_diamdlux_pop','POP Slots','95.50'],
            ['Double Digger B1','gpas_dwpfbb1_pop','POP Slots','93.69'],
            ['Elephant Riches','gpas_elphrich_pop','POP Slots','95.64'],
            ['Fei Long Zai Tian','gpas_flztian_pop','POP Slots','96.03'],
            ['Feng Shui Flip','gpas_fsflip_pop','POP Slots','95.48'],
            ['Fire Blaze: Sky Queen Megaways','gpas_sqmways_pop','POP Slots','95.86'],
            ['Full Moon: White King','gpas_fmwking_pop','POP Slots','95.73'],
            ['Gates of Camelot','gpas_goc_pop','POP Slots','95.51'],
            ['Gold Hit & Link: Tiger Jones','gpas_ghlink2_pop','POP Slots','95.45'],
            ['Gold Hit: Lil Demon B1','gpas_ghitdevb1_pop','POP Slots','93.62'],
            ['Gold Trio','gpas_gtfb_pop','POP Slots','95.90'],
            ['Hot Gems','gpas_hgems_pop','POP Slots','95.99'],
            ['Lil Demon: Mega Cash Collect','gpas_ldmcashc_pop','POP Slots','95.50'],
            ['Lucky Bass: Mega Cash Collect','gpas_lbmcc_pop','POP Slots','95.51'],
            ['Mega Fire Blaze: Dwarves and Goblins','gpas_mfbdag_pop','POP Slots','95.71'],
            ['Panther Moon: Bonus Lines','gpas_pmoonbl_pop','POP Slots','95.54'],
            ['Samurai Fury','gpas_samufur_pop','POP Slots','95.50'],
            ["Sinbad's Golden Voyage",'gpas_sgvoyage_pop','POP Slots','97.00'],
            ["Spin 'Em Round! B1",'gpas_woluckb1_pop','POP Slots','93.09'],
            ['Sweet N Juicy','gpas_swnj_pop','POP Slots','95.87'],
            ['Wolves! Cash Collect & Link','gpas_wolcc_pop','POP Slots','95.57'],
            ['Big Bad Wolf','pop_bbw_qsp','POP Slots','97.34'],
            ['Big Bad Wolf Megaways','pop_85462c30_qsp','POP Slots','0'],
            ['Big Bad Wolf: Pigs of Steel','pop_340fe252_qsp','POP Slots','0'],
            ['Book of Duat','pop_89191489_qsp','POP Slots','0'],
            ["Brawler's Bar Cash Collect",'pop_9d921557_qsp','POP Slots','0'],
            ['Brooklyn Bootleggers','pop_e5856c4b_qsp','POP Slots','0'],
            ['Cash Truck','pop_93fdb01a_qsp','POP Slots','0'],
            ['Cash Truck 2','pop_98ab31e5_qsp','POP Slots','0'],
            ['Cash Truck 3 Turbo','pop_10f85cb5_qsp','POP Slots','0'],
            ['Cash Truck Xmas Delivery','pop_7c63a490_qsp','POP Slots','0'],
            ["Catrina's Coins",'pop_ff6be051_qsp','POP Slots','0'],
            ['Dog Town Deal','pop_a43538aa_qsp','POP Slots','0'],
            ['Dragon Shrine','pop_dragonshrine_qsp','POP Slots','96.55'],
            ['Eastern Emeralds','pop_eastrnemrlds_qsp','POP Slots','96.58'],
            ['Eastern Emeralds Megaways','pop_68f6f2e6_qsp','POP Slots','0'],
            ['Feasting Fox','pop_c1aa8d1f_qsp','POP Slots','0']
        ];
    }

    public function gameList2()
    {
        return [
            ['Golden Glyph','pop_goldenglyph_qsp','POP Slots','96.19'],
            ['Golden Glyph 3','pop_74e6d9ba_qsp','POP Slots','0'],
            ['Hammer of Vulcan','pop_b55ba1d4_qsp','POP Slots','0'],
            ['Raven Rising','pop_4512e199_qsp','POP Slots','0'],
            ['Sakura Fortune','pop_skrfrtn_qsp','POP Slots','96.58'],
            ['Sakura Fortune 2','pop_518163c8_qsp','POP Slots','0'],
            ['Sticky Bandits Unchained','pop_7d18960b_qsp','POP Slots','0'],
            ['Warp Wreckers Power Glyph','pop_f345af8e_qsp','POP Slots','94.03'],
            ['Wild Harlequin','pop_db8e20f2_qsp','POP Slots','0'],
            ['Wins of Fortune','pop_winsfortune_qsp','POP Slots','96.54'],
            ['1-Of-A-Kind','gpas_1reeler_pop','POP Slots','95.56'],
            ['28 Mansions','gpas_28dman_pop','POP Slots','96.94'],
            ['A Night Out','hb','Slot Machines','97.06'],
            ['Absolutely Mammoth','gpas_amammoth_pop','POP Slots','96.49'],
            ['Age of Egypt','agoeg','Slot Machines','97.05'],
            ['Age of the Gods Scratch','gpas_aogiw_pop','POP Slots','95.00'],
            ['Alohawaii: Cash Collect','gpas_alohacc_pop','POP Slots','95.87'],
            ['Anaconda Uncoiled','gpas_auncoil_pop','POP Slots','95.96'],
            ['Anaconda Wild','anwild','Slot Machines','95.48'],
            ['Anaconda Wild 2','gpas_awild2_pop','POP Slots','96.47'],
            ['Anaconda Wild Scratch','gpas_awildiw_pop','POP Slots','95.00'],
            ['Animal Instinct','gpas_big5_pop','POP Slots','95.51'],
            ['Archer','arc','Slot Machines','96.77'],
            ["Arowana's Luck",'gpas_aluck_pop','POP Slots','97.52'],
            ['Asian Fantasy','asfa','Slot Machines','96.02'],
            ['Atlantis: Cash Collect','gpas_ccskingofa_pop','POP Slots','96.25'],
            ['Aztec Expedition Thundershots','gpas_aexpedition_pop','POP Slots','95.50'],
            ['Azteca: Bonus Lines','gpas_azboli_pop','POP Slots','94.93'],
            ['Azteca: Cash Collect','gpas_aztecw_pop','POP Slots','95.43'],
            ['Bai Shi','bs','Slot Machines','95.99'],
            ['Bee Frenzy','gpas_bfrenzy_pop','POP Slots','96.14'],
            ['Bermuda Triangle','bt','Slot Machines','0'],
            ['Berry Berry Bonanza','bbbo','Slot Machines','95.99'],
            ['Better Wilds','gpas_betwilds_pop','POP Slots','96.42'],
            ['Big Shots','bigsh','Slot Machines','96.10'],
            ['Blazing Bells','gpas_bbells_pop','POP Slots','96.37'],
            ['Blitz Scratch','gpas_blitziw_pop','POP Slots','95.00'],
            ['Bonus Bears','bob','Slot Machines','95.17'],
            ['Bonus Train Bandits','gpas_btbandit_pop','POP Slots','96.12'],
            ['Book of Kings','gpas_boking_pop','POP Slots','96.63'],
            ['Breakout Bob','gpas_bbob_pop','POP Slots','96.52'],
            ['Buccaneer Blast','gpas_pblast_pop','POP Slots','96.15'],
            ['Buckle Up','bup','Slot Machines','0'],
            ['Buffalo Blitz','bfb','Slot Machines','95.96'],
            ['Buffalo Blitz II','gpas_bblitz2_pop','POP Slots','95.96'],
            ['Caishen Ways','gpas_cways_pop','POP Slots','96.91'],
            ["Captain's Treasure",'ct','Slot Machines','97.06'],
            ['Cascading Cave','gpas_ccave_pop','POP Slots','95.83'],
            ['Cash Collect Scratch','gpas_srichesiw_pop','POP Slots','95.00'],
            ['Casino Charms','gpas_cascharms_pop','POP Slots','96.06']
        ];
    }

    public function gameList3()
    {
        return [
            ['Cat Queen','catqc','Slot Machines','93.60'],
            ['Chaoji 888','chao','Video Slots','0'],
            ['Chili Eruption','gpas_ceruption_pop','POP Slots','96.17'],
            ['Chilli Xtreme','gpas_cxtreme_pop','POP Slots','95.23'],
            ['Chinese Kitchen','cm','Slot Machines','96.92'],
            ['Crazy 7','c7','Slot Machines','0'],
            ['Curse of Anubis','gpas_soanubis_pop','POP Slots','96.02'],
            ["Da Vinci's Vault",'dvncv','Slot Machines','0'],
            ['Desert Treasure','mobdt','Slot Machines','97.05'],
            ['Devil Wilds','gpas_devwilds_pop','POP Slots','95.50'],
            ['Diamond Match','gpas_dmatch_pop','POP Slots','95.41'],
            ['Diamond Rise','gpas_drise_pop','POP Slots','95.96'],
            ['Divine 9','gpas_divine_pop','POP Slots','0'],
            ['Dolphin Reef','dnr','Slot Machines','95.23'],
            ['Dragon Champions','drgch','Slot Machines','95.12'],
            ['Dragon Chi','gpas_dragonchi_pop','POP Slots','96.87'],
            ['Dragon Spark','gpas_dsparks_pop','POP Slots','96.31'],
            ["Dragon's Hall: Thundershots",'gpas_dhall_pop','POP Slots','95.35'],
            ['Easter Surprise','eas','Slot Machines','97.05'],
            ['Egyptian Emeralds','gpas_eemeralds_pop','POP Slots','96.39'],
            ['Eliminators','gpas_eliminators_pop','POP Slots','0'],
            ['Empire Treasures Scratch','gpas_emptriw_pop','POP Slots','95.00'],
            ['Epic Ape','epa','Slot Machines','95.96'],
            ['Extreme Fruits Ultimate Deluxe','gpas_extrfruits_pop','POP Slots','96.00'],
            ['Eye of Anubis','gpas_sscarab_pop','POP Slots','95.76'],
            ['Fairground Fortunes Ghost Train','ashfgf','Slot Machines','94.06'],
            ['Fairy Gathering: Thundershots','gpas_fgather_pop','POP Slots','95.59'],
            ['Feng Kuang Ma Jiang','fkmj','Slot Machines','96.06'],
            ['Fire 4: Cash Collect Quattro','gpas_f4ccd_pop','POP Slots','94.80'],
            ['Fire Blaze Golden: Amazing Factory','gpas_afactory_pop','POP Slots','96.50'],
            ['Fire Blaze Golden: Buccaneer Bells','gpas_fbgbb_pop','POP Slots','96.48'],
            ['Fire Blaze Scratch','gpas_fblazeiw_pop','POP Slots','95.00'],
            ['Fire Blaze: Adventure Trail','gpas_atrail_pop','POP Slots','96.64'],
            ['Fire Blaze: Blue Wizard','gpas_bwizard_pop','POP Slots','96.50'],
            ['Fire Blaze: Blue Wizard Megaways','gpas_mgbwizard_pop','POP Slots','96.48'],
            ['Fire Blaze: Eternal Lady','gpas_elady_pop','POP Slots','96.50'],
            ['Fire Blaze: Fire Fighter','gpas_ffighter_pop','POP Slots','95.92'],
            ['Fire Blaze: Golden Macaque','gpas_gmacaque_pop','POP Slots','96.73'],
            ['Fire Blaze: Green Wizard','gpas_gwizard_pop','POP Slots','95.90'],
            ['Fire Blaze: Jinns Moon','gpas_jmoon_pop','POP Slots','96.58'],
            ['Fire Blaze: Pearls Pearls Pearls','gpas_pppearls_pop','POP Slots','96.50'],
            ["Fire Blaze: Pharaoh's Daughter",'gpas_scqueen_pop','POP Slots','96.50'],
            ['Fire Blaze: Red Wizard','gpas_rwizard_pop','POP Slots','96.49'],
            ['Fire Blaze: River Empress','gpas_rempress_pop','POP Slots','96.50'],
            ['Fire Blaze: Sisters Gift','gpas_sgift_pop','POP Slots','96.47'],
            ['Fire Blaze: Sky Queen','gpas_squeen_pop','POP Slots','96.58'],
            ['Fire Blaze: Toltec Blocks','gpas_qctoblo_pop','POP Slots','95.92'],
            ["Fire Blaze: Tsai Shen's Gift",'gpas_tsgift_pop','POP Slots','96.50'],
            ['Fire Blaze: Tundra Wolf','gpas_twolf_pop','POP Slots','96.46'],
            ["Fishin' Bonanza",'gpas_ffever_pop','POP Slots','96.51']
        ];
    }

    public function gameList4()
    {
        return [
            ['Football Rules','fbr','Slot Machines','97.06'],
            ['Football! Cash Collect','gpas_focashco_pop','POP Slots','94.91'],
            ['Forest Prince','gpas_fprince_pop','POP Slots','95.84'],
            ['Fortune Day','fday','Video Slots','0'],
            ['Fortune Fortune: Thundershots','gpas_ffortune_pop','POP Slots','95.52'],
            ['Fortune Lions','frtln','Video Slots','96.63'],
            ['Fortunes of the Fox','fxf','Slot Machines','95.11'],
            ["Frog's Gift",'gpas_fgift_pop','POP Slots','96.76'],
            ['Fruity Showers','gpas_fcascade_pop','POP Slots','95.60'],
            ['Full Moon: White Panda','gpas_wpanda_pop','POP Slots','95.90'],
            ['Full Moon: Wild Track','gpas_wtrack_pop','POP Slots','95.93'],
            ['Funky Monkey','fm','Slot Machines','0'],
            ['Gaelic Luck','popc','Slot Machines','97.06'],
            ['Galactic Streak','galst','Slot Machines','95.95'],
            ['Geisha Story','ges','Slot Machines','95.48'],
            ['Gem Heat','gemheat','Slot Machines','92.05'],
            ['Gem Queen','gemq','Video Slots','96.06'],
            ['Glorious Guardians','gpas_gguardians_pop','POP Slots','96.49'],
            ['Gold Hit & Link: JP Bacon & Co','gpas_goldh4_pop','POP Slots','0'],
            ['Gold Hit: Dragon Bonanza','gpas_goldhit3_pop','POP Slots','95.50'],
            ["Gold Hit: O'Reilly's Riches",'gpas_bcash_pop','POP Slots','95.21'],
            ['Gold Hit: Shrine of Anubis','gpas_goldhit2_pop','POP Slots','95.80'],
            ['Gold Pile: Orangutan!','gpas_gporang_pop','POP Slots','96.46'],
            ['Gold Pile: Tigers Pride','gpas_tfortune_pop','POP Slots','96.47'],
            ['Gold Pile: Toltec Treasure','gpas_ttreasure_pop','POP Slots','96.46'],
            ["Gold Trio: Sinbad's Riches",'gpas_ctrpl_pop','POP Slots','95.90'],
            ['Golden Tour','gos','Slot Machines','97.71'],
            ['Grand Junction: Enchanted Inca','gpas_eninca_pop','POP Slots','96.45'],
            ['Grand Junction: Golden Guns','gpas_ggun_pop','POP Slots','96.41'],
            ['Grand Junction: Mountain Express','gpas_mountexp_pop','POP Slots','96.51'],
            ['Great Blue','bib','Slot Machines','96.03'],
            ['Hainan Ice','gpas_hice_pop','POP Slots','96.82'],
            ['Halloween Fortune','hlf','Slot Machines','97.06'],
            ['Halloween Fortune 2','hlf2','Slot Machines','94.99'],
            ['Halloween Fortune Scratch','gpas_hlfiw_pop','POP Slots','95.00'],
            ['Haunted House','hh','Slot Machines','0'],
            ['Heart of the Frontier','ashhof','Slot Machines','0'],
            ['Heavenly Ruler','heavru','Slot Machines','96.32'],
            ['Heroes Arrow','gpas_harrow_pop','POP Slots','96.38'],
            ['Highway Kings','hk','Slot Machines','97.06'],
            ['Hit Bar','gpas_fmhitbar_pop','POP Slots','96.00'],
            ['Hit Bar: Gold','gpas_hitbargl_pop','POP Slots','95.61'],
            ['Hologram Wilds','hwilds','Slot Machines','95.97'],
            ['Honey Gems','gpas_hongem_pop','POP Slots','95.46'],
            ['Hot Gems Xtreme','gpas_hgextreme_pop','POP Slots','95.81'],
            ['Hot Gems Xtreme Scratch','gpas_hgextremeiw_pop','POP Slots','95.00'],
            ['Hot KTV','hotktv','Slot Machines','95.56'],
            ['Irish Luck','irl','Slot Machines','94.25'],
            ['Jane Jones in Book of Kings 2','gpas_nalight_pop','POP Slots','96.50'],
            ['Jin Qian Wa','jqw','Slot Machines','96.96']
        ];
    }

    public function gameList5()
    {
        return [
            ['Joker Rush','gpas_jrush_pop','POP Slots','96.00'],
            ['Joker Rush: Cash Collect','gpas_jrushcc_pop','POP Slots','95.44'],
            ['Juego de la oca','jdlo','Slot Machines','95.08'],
            ['Jungle Giants','jnglg','Slot Machines','95.06'],
            ['Jurassic Island 2','gpas_jisland2_pop','POP Slots','95.70'],
            ['Legacy of the Wild','legwld','Slot Machines','96.06'],
            ['Legacy of the Wilds 2','gpas_lotwild2_pop','POP Slots','96.36'],
            ["Leprechaun's Luck: Cash Collect",'gpas_ccluck_pop','POP Slots','95.38'],
            ['Lie Yan Zuan Shi','ght_a','Slot Machines','94.99'],
            ['Lock & Hit: Red Knight','gpas_monreelsa1_pop','POP Slots','95.47'],
            ['Lockdown Loot','gpas_pbreak_pop','POP Slots','0'],
            ['Long Long Long','longlong','Slot Machines','96.31'],
            ['Lotto Madness','lm','Slot Machines','97.06'],
            ['Lovefool','gpas_scupid_pop','POP Slots','96.32'],
            ['Lucky Emeralds','gpas_lemeralds_pop','POP Slots','95.74'],
            ['Luminous Life','lumli','Slot Machines','94.44'],
            ['Magical Stacks','mgstk','Slot Machines','95.03'],
            ['Maji Wilds','mwilds','Slot Machines','95.25'],
            ['Mayan Blocks','gpas_mblocks_pop','POP Slots','95.36'],
            ['Mega Fire Blaze: Big Circus!','gpas_bcircus_pop','POP Slots','96.37'],
            ['Mega Fire Blaze: Emperor of Rome','gpas_eofrome_pop','POP Slots','94.91'],
            ['Mega Fire Blaze: Khonsu God of Moon','gpas_kgomoon_pop','POP Slots','96.49'],
            ['Mega Fire Blaze: Legacy of the Tiger','gpas_lottiger_pop','POP Slots','96.59'],
            ['Mega Fire Blaze: Piggies and the Bank','gpas_engage_pop','POP Slots','95.38'],
            ['Mega Fire Blaze: Wild Pistolero','gpas_wpisto_pop','POP Slots','95.96'],
            ['Midnight Wilds','gpas_mwilds_pop','POP Slots','0'],
            ['Mighty Hat: Lamp of Gold','gpas_gwish_pop','POP Slots','96.24'],
            ["Mighty Hat: Mine O' Mine",'gpas_grush_pop','POP Slots','96.25'],
            ['Mighty Hat: Mystic Tales','gpas_mforest_pop','POP Slots','95.66'],
            ['Miss Fortune','mfrt','Slot Machines','95.03'],
            ['Monkey and Rat','gpas_marat_pop','POP Slots','97.52'],
            ['Monster Multipliers','gpas_sking_pop','POP Slots','95.70'],
            ['Mr. Cashback','mcb','Slot Machines','95.37'],
            ["Neptune's Kingdom",'nk','Slot Machines','97.19'],
            ["New Year's Bonanza",'gpas_nyslot_pop','POP Slots','95.99'],
            ['Ni Shu Shen Me','gpas_nsshen_pop','POP Slots','96.86'],
            ['Ox Riches','gpas_strongox_pop','POP Slots','96.93'],
            ['Panda Luck','gpas_pluck_pop','POP Slots','96.91'],
            ['Panther Moon','pmn','Slot Machines','95.17'],
            ['Panther Pays','gpas_panthpays_pop','POP Slots','96.25'],
            ['Penguin Vacation','pgv','Slot Machines','94.25'],
            ["Pharaoh's Secrets",'pst','Slot Machines','0'],
            ['Pigeons From Space!','gpas_pigeonfs_pop','POP Slots','95.97'],
            ['Piggies and the Wolf','paw','Slot Machines','92.10'],
            ['Plunder Ahoy!','gpas_pahoy_pop','POP Slots','95.51'],
            ['Power Zones: Ishtar','gpas_ishtar_pop','POP Slots','95.52'],
            ['Power Zones: Legend of Hydra','gpas_hydra_pop','POP Slots','96.56'],
            ['Power Zones: Pyramid Valley','gpas_pstrike_pop','POP Slots','95.36'],
            ['Power Zones: Stallion Strike','gpas_sstrike_pop','POP Slots','0'],
            ['Power Zones: Thunder Birds','gpas_tbirds_pop','POP Slots','96.42']
        ];
    }

    public function gameList6()
    {
        return [
            ['Pumpkin Bonanza','gpas_pumpkinb_pop','POP Slots','95.51'],
            ['Pyramid Linx','gpas_plink_pop','POP Slots','95.95'],
            ["Qin's Empire: Caishen's Temple",'gpas_ctemple_pop','POP Slots','96.46'],
            ["Qin's Empire: Celestial Guardians",'gpas_cguard_pop','POP Slots','96.45'],
            ['Queen of the Pyramids: Mega Cash Collect','gpas_queenotp_pop','POP Slots','95.41'],
            ['Queen of Wands','qnw','Slot Machines','96.96'],
            ['Quest West','gpas_mquest_pop','POP Slots','96.45'],
            ['Ready to Blow: Thundershots','gpas_retoblow_pop','POP Slots','95.61'],
            ['Record Riches!','gpas_rriches_pop','POP Slots','97.45'],
            ['Retro Rush','gpas_rrider_pop','POP Slots','96.10'],
            ['Ri Ri Jin Cai','ririjc','Slot Machines','0'],
            ['Rich Roll: Lust for Gold!','gpas_rrlustforg_pop','POP Slots','95.89'],
            ['Rogues Draw','gpas_rogue_pop','POP Slots','96.00'],
            ['Rome and Glory','rng2','Slot Machines','94.36'],
            ['Royal Respin Deluxe','rrd','Slot Machines','95.09'],
            ['Sacred Stones','scrdstns','Slot Machines','96.15'],
            ['Safari Heat','sfh','Slot Machines','96.16'],
            ['Sahara Riches Cash Collect','gpas_ccsahara_pop','POP Slots','95.67'],
            ['Sahara Riches MegaWays: Cash Collect','gpas_mgccsahara_pop','POP Slots','94.88'],
            ['Santa Surprise','ssp','Slot Machines','97.05'],
            ['Savage Jungle','gpas_sjungle_pop','POP Slots','96.54'],
            ['Secrets of the Amazon','samz','Slot Machines','95.30'],
            ['Sherlock Mystery','shmst','Slot Machines','94.09'],
            ['Shields of Rome','gpas_sorome_pop','POP Slots','0'],
            ['Si Xiang','sx','Slot Machines','96.00'],
            ['Silent Samurai','sis','Slot Machines','95.77'],
            ['Silver Bullet','sib','Slot Machines','96.84'],
            ['Silver Bullet Bandit: Cash Collect','gpas_sbullet_pop','POP Slots','95.44'],
            ["Sorcerer's Guild of Magic",'gpas_sgomagic_pop','POP Slots','96.09'],
            ['Starmada Exiles','gpas_sexiles_pop','POP Slots','96.15'],
            ['Stars Ablaze','gpas_starsablaze_pop','POP Slots','95.50'],
            ['Stars Awakening','strsawk','Slot Machines','95.93'],
            ['Thai Paradise','tpd2','Slot Machines','94.36'],
            ['The Riches of Don Quixote','donq','Slot Machines','94.99'],
            ['Tiger Claw','tigc','Slot Machines','95.96'],
            ['Tiger Stacks','gpas_tstacks_pop','POP Slots','96.52'],
            ['Tiger Turtle Dragon Phoenix','gpas_tigertdp_pop','POP Slots','96.94'],
            ['Tip Top Totems','gpas_tttotems_pop','POP Slots','96.56'],
            ["Toad's Gift",'gpas_tgift_pop','POP Slots','96.76'],
            ['Treasures of the Lamps','totl','Slot Machines','95.25'],
            ['Triple Monkey','trpmnk','Video Slots','96.99'],
            ['Triple Stop: Hercules Rules','gpas_hrules_pop','POP Slots','95.48'],
            ['Triple Stop: Mermaids Find','gpas_merfind_pop','POP Slots','95.48'],
            ['True Love','trl','Slot Machines','94.35'],
            ['Ugga Bugga','ub','Slot Machines','0'],
            ['Vacation Station','er','Slot Machines','96.93'],
            ['Vacation Station Deluxe','vcstd','Slot Machines','0'],
            ['Vampire Princess of Darkness','gpas_vampirep_pop','POP Slots','95.50'],
            ['Ways of the Genie','gpas_wotgenie_pop','POP Slots','95.48'],
            ['Ways of the Phoenix','wotp','Slot Machines','95.98 ']
        ];
    }

    public function gameList7()
    {
        return [
            ['Wheels of Flame','gpas_wofire1_pop','POP Slots','95.51'],
            ['White King','whk','Slot Machines','90.05'],
            ['White King II','whk2','Slot Machines','91.40'],
            ['Wild Lava','gpas_wlava_pop','POP Slots','96.47'],
            ['Wild Lava Scratch','gpas_wlavaiw_pop','POP Slots','95.00'],
            ['Wild LinX','gpas_wlinx_pop','POP Slots','96.49'],
            ['Wild West Wilds!','gpas_wwd_pop','POP Slots','96.14'],
            ['Witches: Cash Collect','gpas_cchfortune_pop','POP Slots','95.67'],
            ['Wolves! Wolves! Wolves!','www','Slot Machines','94.08'],
            ['Wu Long','wlg','Slot Machines','0'],
            ['Wushu Punch','gpas_wpunch_pop','POP Slots','95.99'],
            ['Yu Tu Jin Cai: Cash Collect','gpas_rabbitcash_pop','POP Slots','94.91'],
            ['Yun Cong Long','yclong','Slot Machines','95.99'],
            ['Zhao Cai Jin Bao','zcjb','Slot Machines','95.99'],
            ['Zhao Cai Tong Zi','zctz','Video Slots','97.00'],
            ['Zodiac Charms','gpas_zcharms_pop','POP Slots','96.46'],
            ['1000 Diamond Bet Roulette','db1000ro','Table Games','0'],
            ['101 Roulette','ro101','Table Games','0'],
            ['3 Card Brag','3cb','Card Games','0'],
            ['7 E Mezzo','sem','Card Games','0'],
            ['Baccarat','ba','Card Games','0'],
            ['Baccarat without Sidebets','baws','Card Games','0'],
            ['Banca Francesa','bafr','Table Games','98.41'],
            ['Blackjack MH5 (Mobile Blackjack)','mobbj','Card Games','99.58'],
            ['Blackjack Mini','mbj','Mini games','99.58'],
            ['Blackjack Surrender','bjsd2','Card Games','99.66'],
            ['Blackjack Switch','bjs','Card Games','99.92'],
            ['Buster Blackjack','bjbu','Card Games','99.58'],
            ['Cash Collect Roulette','ccro','Table Games','97.30'],
            ['Cash Collect Roulette BF','ccrobf','Table & Card Games','97.40'],
            ['Cash It','crit','Arcade','95.99'],
            ['Cash Plane X5000','cpx5k','Arcade','95.99'],
            ['Cash It Multiplayer','gpas_critmp_pop','POP Arcade','97.00'],
            ['Cashback Blackjack','bjcb','Card Games','0'],
            ["Casino Hold'Em",'cheaa','Card Games','0'],
            ['Circus Launch','circ','Arcade','95.99'],
            ['Classic Roulette','ro','Table Games','97.30'],
            ['Diamond Bet Roulette','dbro','Table Games','0'],
            ['European Football Roulette','eufro','Table Games','97.30'],
            ['FISH! Shoot For Cash','fishshr','Arcade','95.80'],
            ['Free Chip Blackjack','fcbj','Card Games','99.23'],
            ['Hi-Lo Premium','hilop','Card Games       ','0'],
            ["Heads'up Holdem",'huh','Card Games','0'],
            ['Jacks or Better','po','Video Pokers','0'],
            ['Jacks or Better Classic','jbc','Video Pokers','0'],
            ['Kick It Multiplayer','gpas_kickitmp_pop','POP Arcade','97.00'],
            ['Lucky Lucky Blackjack','bjll','Card Games','0'],
            ['Mega Fire Blaze: Roulette','mfbro','Table Games','97.31'],
            ['Mini Roulette','mro','Fixed Odds','96.15'],
            ['Multiplayer Blackjack','mpbj','Card Games','99.58']
        ];
    }

    public function gameList8()
    {
        return [
            ['Multiplayer Roulette','mpro','Card Games','97.30'],
            ['Penny Roulette','prol','Table Games','97.30'],
            ['Perfect Blackjack','pfbj_mh5','Card Games','99.58'],
            ['Premium American Roulette','rodz_g','Table Games','0'],
            ['Premium blackjack - Single Hand','bjto_sh','Card Games','0'],
            ['Premium Blackjack 2.0','bjto','Card Games','0'],
            ['Premium European Roulette','ro_g','Table Games','97.30'],
            ['Premium French Roulette','frr_g','Table Games','0'],
            ['Quantum Blackjack Plus Instant Play','qbjp','Card Games','99.84'],
            ['Quantum Roulette Instant Play','qro','Table Games','97.30'],
            ['Roulette Deluxe','presrol','Table Games','97.30'],
            ['Roulette Mini','mro_g','Mini games','97.30'],
            ['Space Hunter: Shoot for Cash','shsfc','Arcade','96.50'],
            ['Spin a Win','lwh','Fixed Odds','0'],
            ['Spin Till You Win Roulette','stywro','Table Games','97.30'],
            ['Spread Bet Roulette','sbro','Table Games','0'],
            ['Super Roulette','supro','Table Games','0'],
            ['Vegas Blackjack!','bj65','Card Games','0']
        ];
    }
}
