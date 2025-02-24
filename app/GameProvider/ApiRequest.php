<?php

namespace App\GameProvider;

use Illuminate\Support\Facades\Http;

trait ApiRequest
{
    use LogData;

    private function sendApiRequest(
        string $environment,
        string $token,
        string $url,
        array $request,
        string $provider
    ): void {
        $response = Http::withHeaders(headers: ['Authorization' => $token])
            ->post(url: $url, data: $request);

        $this->logData(
            environment: $environment,
            fileName: "{$provider}-{$environment}",
            requestData: [$request],
            responseData: $response
        );
    }

    public function uploadToStaging(array $request, string $provider): void
    {
        foreach ($request as $data) {
            $this->sendApiRequest(
                environment: 'staging',
                token: 'Bearer ' . env('BEARER_TOKEN_STG'),
                url: env('ADD_GAME_API_STG'),
                request: $data,
                provider: $provider
            );
        }
    }

    public function uploadToProduction(array $request, string $provider): void
    {
        foreach ($request as $data) {
            $this->sendApiRequest(
                environment: 'production',
                token: 'Bearer ' . env('BEARER_TOKEN_PROD'),
                url: env('ADD_GAME_API_PROD'),
                request: $data,
                provider: $provider
            );
        }
    }
}