<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class SBOController
{
    use RequestBuilder, ApiRequest, LogData;

    public function staging(): void
    {
        $data = $this->stagingGameList();

        $request = $this->buildApiRequest(
            providerCode: 'SBO',
            providerName: 'SBO Sportsbook',
            startPosition: 1,
            data: $data,
            gameType: 'sportsbook',
        );

        // $this->logRequestData(requestData: $request);

        // $this->testLogData(requestData: $request);

        // $this->uploadToStaging(request: $request, provider: 'SBO');

        // $this->uploadToProduction(request: $request, provider: 'SBO');
    }

    public function stagingDelete(): void
    {
        $data = $this->stagingGameList();

        $request = $this->buildDeleteRequest(
            providerCode: 'SBO',
            data: $data
        );

        // $this->testLogData(requestData: $request);

        // $this->deleteInStaging(request: $request, provider: 'SBO');

        // $this->deleteInProduction(request: $request, provider: 'SBO');
    }

    private function stagingGameList(): array
    {
        return [
            ['testGameCode', 'testGameName', '89'],
            ['testGameCode2', 'testGameName2', '90'],
            ['testGameCode3', 'testGameName3', '75']
        ];
    }
}