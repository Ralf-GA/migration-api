<?php

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class OrsMigrationTest extends TestCase
{
    public function testMigrate()
    {
        Http::fake([
            env('ORS_API_URL_STG') => Http::response([
                'rs_code' => 'S-100',
                'records' => [
                    [
                        'game_id' => 1,
                        'game_name' => 'Test Game',
                        'game_type' => 'Slot Game'
                    ]
                ]
            ], 200)
        ]);

        Http::fake([
            'dummyApi.com' => Http::response([], 200)
        ]);

        $this->call('POST', '/migrate/ors');

        Http::assertSent(function ($request) {
            return $request->url() == env('ORS_API_URL_STG') &&
                $request->hasHeader('key', env('ORS_KEY_STG')) &&
                $request->hasHeader('operator-name', env('ORS_OPERATOR_NAME_STG'));
        });

        Http::assertSent(function ($request) {
            return $request->url() == 'dummyApi.com' &&
                $request->hasHeader('Authorization', 'Bearer ' . env('BEARER_TOKEN_STG')) &&
                $request->data()['providerCode'] == 'ORS';
        });
    }
}
