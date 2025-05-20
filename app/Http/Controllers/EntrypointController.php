<?php

namespace App\Http\Controllers;

class EntrypointController
{
    private array $providers = [
        'ors' => 'ORSController',
        'sbo' => 'SBOController',
        'sab' => 'SABController',
        'jdb' => 'JDBController',
        'hcg' => 'HCGController',
        'bes' => 'BESController',
        'pla' => 'PLAController',
        'pca' => 'PCAController',
        'ygr' => 'YGRController',
        'hg5' => 'HG5Controller',
        'aix' => 'AIXController',
    ];

    private function requestHandler(string $providerCode, string $environment): void
    {
        if (isset($this->providers[$providerCode]) === false)
            dd("ProviderCode Not Set. Check Endpoint");

        $controller = "App\GameProvider\Controllers\\{$this->providers[$providerCode]}";

        if (class_exists($controller) === false)
            dd("{$this->providers[$providerCode]} does not exist.");

        if (method_exists($controller, $environment) === false)
            dd("Method {$environment} does not exist in {$this->providers[$providerCode]}.");

        app()->call(callback: "{$controller}@{$environment}");

        dd('Done!');
    }

    public function staging(string $providerCode)
    {
        return $this->requestHandler(providerCode: $providerCode, environment: 'staging');
    }

    public function production(string $providerCode)
    {
        return $this->requestHandler(providerCode: $providerCode, environment: 'production');
    }

    public function stagingDelete(string $providerCode)
    {
        return $this->requestHandler(providerCode: $providerCode, environment: 'stagingDelete');
    }

    public function productionDelete(string $providerCode)
    {
        return $this->requestHandler(providerCode: $providerCode, environment: 'productionDelete');
    }
}