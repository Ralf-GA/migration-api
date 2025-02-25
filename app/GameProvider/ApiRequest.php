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
        array $data,
        string $provider
    ): void {
        foreach ($data as $request) {
            $response = Http::withHeaders(headers: ['Authorization' => $token])
                ->post(url: $url, data: $request);

            $this->logData(
                environment: $environment,
                fileName: "{$provider}-{$environment}",
                requestData: [$request],
                responseData: $response
            );
        }
    }

    public function uploadToStaging(array $request, string $provider): void
    {
        $this->sendApiRequest(
            environment: 'staging',
            token: 'Bearer ' . env('BEARER_TOKEN_STG'),
            url: env('ADD_GAME_API_STG'),
            data: $request,
            provider: $provider
        );
    }

    public function uploadToProduction(array $request, string $provider): void
    {
        $this->sendApiRequest(
            environment: 'production',
            token: 'Bearer ' . env('BEARER_TOKEN_PROD'),
            url: env('ADD_GAME_API_PROD'),
            data: $request,
            provider: $provider
        );
    }

    public function deleteInStaging(array $request, string $provider): void
    {
        $this->sendApiRequest(
            environment: 'staging',
            token: 'Bearer ' . env('DELETE_API_BEARER_TOKEN_STG'),
            url: env('DELETE_GAME_API_STG'),
            data: $request,
            provider: $provider
        );
    }

    public function deleteInProduction(array $request, string $provider): void
    {
        $this->sendApiRequest(
            environment: 'production',
            token: 'Bearer ' . env('DELETE_API_BEARER_TOKEN_PROD'),
            url: env('DELETE_GAME_API_PROD'),
            data: $request,
            provider: $provider
        );
    }
}