<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class BESController
{
    use RequestBuilder, ApiRequest, LogData;

    public function production()
    {
        $data = $this->prodGameList();

        $request = $this->buildApiRequest(
            providerCode: 'BES',
            providerName: 'Be Soft',
            startPosition: 1,
            data: $data,
            gameType: 'slot',
        );

        $this->logRequestData(requestData: $request);

        $this->testLogData(requestData: $request);

        // $this->uploadToProduction(request: $request, provider: 'BES');
    }

    private function prodGameList(): array
    {
        return [
            ['be029', 'Mad Bandito', '97.39'],
            ['be028', 'Money Piggy', '97.68'],
            ['be005', 'Mahjong Wins', '96.38'],
            ['be007', 'XiangQi Ways', '96.5'],
            ['be011', 'Golden Gunslinger', '96.31'],
            ['be023', 'Epic of Thor', '96.55'],
            ['be022', 'DJ Party', '96.44'],
            ['be020', 'Bikini Beach', '96.5'],
            ['be006', 'Poker Ways', '96.5'],
            ['be002', 'Jackpot Cow', '96.5'],
            ['be001', 'Duo Cai Duo Fu', '97'],
            ['be014', 'Candy Frenzy', '96.5'],
            ['be027', 'Domino Ways', '97.28'],
            ['be026', 'Treasures of Maya', '97.33'],
            ['be025', 'Wild Snake', '96.5'],
            ['be024', 'Leprechaun Fortune', '97.44'],
            ['be021', 'Butterfly Rose', '96.5'],
            ['be019', 'Sweet Crush Xmas', '96.5'],
            ['be018', 'Lucky Tiger', '96.5'],
            ['be017', 'Wild Wild Fruits', '97.5'],
            ['be016', 'Master Gemsword', '96.05'],
            ['be015', 'Tokyo Neko', '96.4'],
            ['be013', 'Tasty Crush', '97'],
            ['be010', 'Pharaoh Treasures', '97'],
            ['be009', 'Starry Princess', '96.5'],
            ['be008', 'Ganesha Wealth', '96.5'],
            ['be003', 'Flower of Magic', '96.5'],
            ['afa001', 'Gem of Olympus', '96.5'],
            ['afa003', 'Gift of Princess', '96.5'],
            ['afa004', 'Dragon Stash', '97'],
            ['afa005', 'Sugar Bonanza', '97'],
            ['afa007', 'The Dog Team', '96.59'],
            ['afa009', '5 Kirin', '96.5'],
            ['afa011', '5 Bunny', '97'],
            ['afa012', 'Book of 88', '96.5'],
            ['afa013', 'Double Wolf Fortune', '97.1'],
            ['afa014', 'Eyes Bonanza', '96.49'],
            ['afa016', 'Kaboom Bonanza', '96.5'],
            ['afa019', 'Pyramid Money', '97'],
            ['afa021', 'Sugar Crush', '96.5'],
            ['afa022', 'Sugar Crush Xmas', '96.5'],
            ['afa028', 'Wild West Gift', '96.31']
        ];
    }
}
