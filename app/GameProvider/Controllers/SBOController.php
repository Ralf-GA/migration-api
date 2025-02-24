<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class SBOController
{
    use RequestBuilder, ApiRequest, LogData;

    public function staging()
    {
        $data = $this->gameSlotData();

        $request = $this->buildRequest(
            providerCode: 'SBO',
            providerName: 'SBO Sportsbook',
            position: 1,
            data: $data,
            type: 'sportsbook',
        );

        $this->testLogData(requestData: $request);
        // dd($request);

        // $this->uploadToStaging(request: $request, provider: 'SBO');

        // $this->uploadToProduction(request: $request, provider: 'SBO');

        dd('done');
    }

    private function gameSlotData(): array
    {
        return [
            ['testGameCode', 'testGameName', '89'],
            ['testGameCode2', 'testGameName2', '90'],
            ['testGameCode3', 'testGameName3', '75']
        ];
    }

    private function gameArcadeData(): array
    {
        return [
            ['testGameCode', 'testGameName', '89'],
            ['testGameCode2', 'testGameName2', '90'],
            ['testGameCode3', 'testGameName3', '75']
        ];
    }
}