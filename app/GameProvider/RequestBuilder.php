<?php

namespace App\GameProvider;

use Illuminate\Support\Str;

trait RequestBuilder
{
    public function buildRequest(
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
}