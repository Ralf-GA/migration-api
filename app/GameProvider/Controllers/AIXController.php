<?php

namespace App\GameProvider\Controllers;

use App\GameProvider\LogData;
use App\GameProvider\ApiRequest;
use App\GameProvider\RequestBuilder;

class AIXController
{
    use RequestBuilder, ApiRequest, LogData;

    private const PROVIDER_CODE = 'AIX';

    public function staging(): void
    {
        $slotData = $this->stagingGames();

        $request = $this->buildApiRequest(
            providerCode: self::PROVIDER_CODE,
            providerName: 'AIX',
            startPosition: 1,
            data: $slotData,
            gameType: 'slot',
        );

        // $this->testLogData(requestData: $request);
        // dd($request);

        $this->uploadToStaging(request: $request, provider: self::PROVIDER_CODE);
    }

    private function stagingGames(): array
    {
        return [
            ['1', "Dragon God", "92.00"],
            ['2', "Dragon King", "92.00"],
            ['3', "Monkey King", "92.00"],
        ];
    }
}