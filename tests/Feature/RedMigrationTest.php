<?php

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RedMigrationTest extends TestCase
{
    /**
     * @return void
     */
    public function test_migration_valid_expected_response()
    {
        Http::fake([
            env('RED_API_URL') => Http::response([
                'status' => 1,
                'game_list' => [
                    '213' => [
                        [
                            'game_id' => 57,
                            'game_name' => "Dragon's Luck",
                            'game_icon_link' => 'https://slots.ps9launcher.com/redtiger/slots/id/57.png',
                            'is_enabled' => 1
                        ]
                    ]
                ]
            ])
        ]);

        Http::fake([
            'dummyApi.com' => Http::response([], 200)
        ]);

        $this->call('POST', '/migrate/red');

        Http::assertSent(function ($request) {
            return $request->url() == env('RED_API_URL') &&
                $request->hasHeader('ag-code', env('RED_AG_CODE')) &&
                $request->hasHeader('ag-token', env('RED_AG_TOKEN')) &&
                $request->data() == ['language' => 'en'];
        });

        Http::assertSent(function ($request) {
            return $request->url() == 'dummyApi.com' &&
                $request->hasHeader('Authorization', 'Bearer ' . env('BEARER_TOKEN')) &&
                $request->data()['providerCode'] == 'RED';
        });
    }
}
