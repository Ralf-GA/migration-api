<?php

namespace App\Http\Controllers;

class EntrypointController
{
    private array $providers = [
        'ORS' => 'ORSController',
        'SBO' => 'SBOController',
        'SAB' => 'SABController',
        'JDB' => 'JDBController',
        'HCG' => 'HCGController',
        'PLA' => 'PLAController',
        'PCA' => 'PCAController',
    ];

    public function staging($providerCode)
    {
        return $this->handleRequest(providerCode: $providerCode, environment: 'Staging');
    }

    public function production($providerCode)
    {
        return $this->handleRequest(providerCode: $providerCode, environment: 'Production');
    }

    private function handleRequest(string $providerCode, string $environment)
    {
        if (isset($this->providers[$providerCode]) === false)
            dd("ProviderCode Not Set. Check Endpoint");

        $controller = "App\GameProvider\Controllers\\{$this->providers[$providerCode]}@{$environment}";

        return app()->call(callback: $controller);
    }
}