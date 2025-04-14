<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class HG5Controller
{
    use RequestBuilder, ApiRequest, LogData;

    public function staging(): void
    {
        $slotData = $this->stagingSlotGames();

        $request = $this->buildApiRequest(
            providerCode: 'HG5',
            providerName: 'HG5',
            startPosition: 1,
            data: $slotData,
            gameType: 'slot',
        );

        $this->uploadToStaging(request: $request, provider: 'HG5');

        // $this->testLogData(requestData: $request);
        // dd($request);

        // $arcadeData = $this->stagingArcadeGames();

        // $request = $this->buildApiRequest(
        //     providerCode: 'HG5',
        //     providerName: 'HG5',
        //     startPosition: 39,
        //     data: $arcadeData,
        //     gameType: 'arcade',
        // );

        // $this->testLogData(requestData: $request);
        // dd($request);

        // $this->uploadToStaging(request: $request, provider: 'HG5');
    }

    private function stagingSlotGames(): array
    {
        return [
            ['8751001', "Club DJ", "97.06"],
            ['8751002', "World Cup", "97.03"],
            ['8751003', "Flying Lion Dance", "96.86"],
            ['8751004', "Pirate Treasures", "96.53"],
            ['8751005', "Pong Pong Pong", "97.01"],
            ['8751006', "Rich Chilli", "97.04"],
            ['8751007', "Gem Party", "97.14"],
            ['8751008', "Fruit Tycoon", "97.08"],
            ['8751009', "Jack and the Beanstalk", "96.97"],
            ['8751010', "Fortune Send Blessing", "97.02"],
            ['8751011', "Beautify Boxing", "97.00"],
            ['8751012', "Zoo Battle", "97.01"],
            ['8751013', "Make A Toast", "96.56"],
            ['8751014', "Heavy Hitter", "96.84"],
            ['8751015', "Shopping Festival", "96.91"],
            ['8751016', "Face Off Opera", "97.01"],
            ['8751017', "Mahjong Hero", "97.09"],
            ['8751020', "The WEED Party", "97.08"],
            ['8751029', "Three-card Match", "97.07"],
            ['8751031', "Star Chef King", "97.04"],
            ['8751032', "Wealthy Minescape", "96.86"],
            ['8751033', "Napoleon", "97.00"],
            ['8751035', "Gold Medalist 2024", "96.99"],
            ['8751036', "Cosmetic Boxing", "97.00"],
            ['8751038', "Basketball Fire", "97.03"],
            ['8751039', "Cricket Battle", "96.99"],
            ['8751040', "American Football", "96.98"],
            ['8751041', "Leap Volley", "97.07"],
            ['8751042', "Golden Slam", "97.01"],
            ['8751044', "Golden Poker", "97.05"],
            ['8751045', "Golden City", "97.02"],
            ['8751047', "Golden Poker 2", "97.02"],
            ['8751048', "Golden City 2", "97.01"],
            ['8751049', "Punch King", "96.89"],
            ['8751050', "Bounty Showdown", "94.96"],
            ['8751051', "Dragon Myth", "96.00"],
            ['8751053', "Crazy777", "94.97"],
            ['8751059', "War of the Gods", "97.00"]
        ];
    }

    private function stagingArcadeGames(): array
    {
        return [
            ['8751021', "CANDY BINGO", "97.05"],
            ['8753001', "Ocean Sovereign-God of Wealth", "97.00"],
            ['8758001', "Click & Win", "97.00"],
            ['8758002', "FLY & RICH", "95.00"],
            ['8758005', "Rich Hammer", "95.00"],
            ['8758006', "Lucky Wheel", "91.67"],
            ['8758007', "Rock Paper Scissors", "97.00"],
            ['8758008', "GOAL SHOT", "97.00"],
            ['8758009', "DICE HIGH OR LOW", "97.00"],
            ['8758010', "Heads or Tails", "97.00"],
            ['8758011', "Frogger", "97.00"],
            ['8758012', "Kick the hero", "97.00"],
            ['8758013', "Power for Punch", "97.00"],
            ['8758014', "Plinko", "97.00"],
            ['8758015', "Mines", "97.00"],
            ['8758016', "Prize Draw Game", "97.00"],
            ['8758017', "Fencing", "91.68"],
            ['8758018', "FLIP DIVING", "97.00"],
            ['8758019', "Surfing", "97.00"],
            ['8758020', "Javelin Throw", "97.00"],
            ['8758021', "Sprinters", "97.00"],
            ['8758023', "Archery", "97.00"],
            ['8758024', "AVIATOR", "97.00"]
        ];
    }
}