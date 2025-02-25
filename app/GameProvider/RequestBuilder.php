<?php

namespace App\GameProvider;

use Illuminate\Support\Str;

trait RequestBuilder
{
    public function buildApiRequest(
        string $providerCode,
        string $providerName,
        int $position,
        array $data,
        string $type
    ): array {
        /**
         * Setup
         * [gameCode, gameName, rtp]
         */

        $requestData = [];

        foreach ($data as $game) {
            [$gameCode, $gameName, $rtp] = $game;

            if (!is_string($rtp) || Str::contains($rtp, '%'))
                dd("RTP {$rtp} invalid", "GameCode: {$gameCode}");

            $requestData[] = [
                'providerCode' => $providerCode,
                'providerName' => $providerName,
                'gameCode' => $gameCode,
                'gameName' => $gameName,
                'position' => $position,
                'type' => $type,
                'rtp' => $rtp,
                'imageUrl' => '-',
                'imageAlt' => $gameName,
            ];

            $position++;
        }

        return $requestData;
    }

    public function buildDeleteRequest(
        string $providerCode,
        array $data
    ): array {
        $requestData = [];

        foreach ($data as $game) {
            [$gameCode] = $game;

            $requestData[] = [
                'provider_code' => $providerCode,
                'code' => $gameCode
            ];
        }

        return $requestData;
    }
}