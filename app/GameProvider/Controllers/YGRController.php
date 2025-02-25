<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class YGRController
{
    use RequestBuilder, ApiRequest, LogData;

    public function staging(): void
    {
        $data = $this->slotGames();

        $request = $this->buildApiRequest(
            providerCode: 'YGR',
            providerName: 'YGR',
            position: 1,
            data: $data,
            type: 'slot',
        );

        // $this->testLogData(requestData: $request);

        // $this->uploadToStaging(request: $request, provider: 'YGR');

        $data = $this->fishGames();

        $request = $this->buildApiRequest(
            providerCode: 'YGR',
            providerName: 'YGR',
            position: 72,
            data: $data,
            type: 'arcade',
        );

        // $this->testLogData(requestData: $request);

        // $this->uploadToStaging(request: $request, provider: 'YGR');

        $data = $this->arcadeGames();

        $request = $this->buildApiRequest(
            providerCode: 'YGR',
            providerName: 'YGR',
            position: 81,
            data: $data,
            type: 'arcade',
        );

        // $this->testLogData(requestData: $request);

        // $this->uploadToStaging(request: $request, provider: 'YGR');
    }

    private function slotGames(): array
    {
        return [
            ['097', "Maya Golden City6", '97'],
            ['096', "GOLDEN PHARAOH", '97'],
            ['095', "Cash Maker 2", '97'],
            ['094', "GOLDEN KINGDOM", '97'],
            ['093', "Lucky Star2", '97'],
            ['092', "Greek Mythology", '97'],
            ['091', "R One", '97'],
            ['090', "Maya Golden City5", '97'],
            ['089', "Lucky Fortune God", '97'],
            ['088', "Fortune Rolling", '97'],
            ['087', "GO NEKO", '97'],
            ['086', "Wealth Potion", '97'],
            ['085', "R!CH", '97'],
            ['084', "Maya Golden City4", '97'],
            ['083', "ROMA GEMS", '97'],
            ['082', "CASH RICH", '97'],
            ['081', "Bison Gallop", '97'],
            ['080', "FRENZY MONEY", '97'],
            ['079', "Legendary Shaman", '97'],
            ['078', "Super Neko", '97'],
            ['077', "Cash Maker", '97'],
            ['076', "Golden Bay Sands", '97'],
            ['075', "Maya Golden City3", '97'],
            ['074', "Bounty Pirate", '97'],
            ['073', "Neon Night", '97'],
            ['072', "Temple Adventure", '97'],
            ['071', "Maya Golden City2", '97'],
            ['069', "Barista BONANZA", '97'],
            ['067', "Night of Millionaire", '97'],
            ['066', "Chain Spin", '97'],
            ['065', "MonteZuma's Treasure", '97'],
            ['064', "Fruit & BAR", '97'],
            ['063', "MahJong God", '97'],
            ['062', "Maya Golden City", '97'],
            ['059', "Cone BONANZA", '97'],
            ['058', "Fu Lu Shou", '97'],
            ['057', "Fish Prawn Crab", '97'],
            ['056', "Treasure of Dragon", '97'],
            ['055', "Lucky Doll", '97'],
            ['054', "Dog's Vacation", '97'],
            ['053', "Puffy Paradise", '97'],
            ['051', "100x Lions 7", '97'],
            ['050', "10x Lions 7", '97'],
            ['049', "100x Diamond 7", '97'],
            ['048', "Bank Robbery", '97'],
            ['045', "Rich Mahjong 2", '97'],
            ['044', "Candy Xmas", '97'],
            ['043', "Lucky Star", '97'],
            ['042', "Cleopatra", '97'],
            ['041', "Money Rush", '97'],
            ['040', "Super More Cash II", '97'],
            ['039', "Sabong", '97'],
            ['038', "Muay Thai", '97'],
            ['036', "10x Diamond 7", '97'],
            ['035', "Fortune God Coming", '97'],
            ['034', "Dragon Egg", '97'],
            ['033', "Piggy Bank", '97'],
            ['032', "Piggy Boom", '97'],
            ['031', "Gold Panda Rush", '97'],
            ['029', "777 More Cash", '97'],
            ['028', "Fortune Lucky 7", '97'],
            ['027', "Lucky Dragon Ball 7", '97'],
            ['026', "Rainbow & Clover 7", '97'],
            ['025', "Super Fire 7", '97'],
            ['024', "Lightning Respin 7", '97'],
            ['023', "5X Diamond 7", '97'],
            ['022', "Koi Respin 7", '97'],
            ['021', "Fortune Lions 7", '97'],
            ['016', "Rich Mahjong", '97'],
            ['004', "Fortune Mahjong", '97'],
            ['001', "Long Long Long 2", '97']
        ];
    }

    private function fishGames(): array
    {
        return [
            ['070', "Make a Killing Fishing", '97'],
            ['068', "Fortune Fishing", '97'],
            ['060', "Captain Fishing", '97'],
            ['052', "LongYa Fishing", '97'],
            ['030', "Chill Fishing", '97'],
            ['020', "Zuma's Honor", '97'],
            ['018', "Dragon Zuma", '97'],
            ['017', "Insect Master", '97'],
            ['012', "Pirates Fishing", '97']
        ];
    }

    private function arcadeGames(): array
    {
        return [
            ['047', "Pinball Fun", '97'],
            ['046', "Scratch & Win", '0'],
            ['037', "Rocket Challenge", '97']
        ];
    }
}