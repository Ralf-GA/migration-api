<?php

namespace App\GameProvider;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

trait LogData
{
    public function logData(
        string $environment,
        string $fileName,
        array $requestData,
        object $responseData
    ): void {
        $logDirectory = base_path(path: "app/GameProvider/Logs/{$environment}");

        if (File::exists(path: $logDirectory) === false)
            mkdir(directory: $logDirectory, permissions: 0777, recursive: true);

        $logFilePath = "{$logDirectory}/{$fileName}.log";

        foreach ($requestData as $data) {
            $logMessage = json_encode(value: [
                'request' => $data,
                'response' => $responseData->body()
            ]);

            Log::channel(channel: $environment)
                ->info(message: $logMessage);

            File::append(
                path: $logFilePath,
                data: "[" . Carbon::now() . "] local.INFO: {$logMessage}" . PHP_EOL
            );
        }
    }

    public function testLogData(array $requestData): void
    {
        $logDirectory = base_path(path: "app/GameProvider/Logs/Test");

        if (File::exists(path: $logDirectory) === false)
            mkdir(directory: $logDirectory, permissions: 0777, recursive: true);

        $fileName = Carbon::now()->format('Y-m-d_H:i:s');
        $logFilePath = "{$logDirectory}/{$fileName}.log";

        foreach ($requestData as $data) {
            $logMessage = json_encode(value: ['request' => $data]);

            Log::channel(channel: 'test')
                ->info(message: $logMessage);

            File::append(
                path: $logFilePath,
                data: "[" . Carbon::now() . "] local.INFO: {$logMessage}" . PHP_EOL
            );
        }
    }

    public function logRequestData(array $requestData): void
    {
        $logDirectory = base_path(path: "app/GameProvider/Logs/Test");

        if (File::exists(path: $logDirectory) === false)
            mkdir(directory: $logDirectory, permissions: 0777, recursive: true);

        $fileName = Carbon::now()->format('Y-m-d_H:i:s');
        $logFilePath = "{$logDirectory}/{$fileName}.txt";

        File::append(
            path: $logFilePath,
            data: json_encode($requestData)
        );
    }
}