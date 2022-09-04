<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Client\PendingRequest;

class StravaActivityService
{
    public function __construct(
        private StravaServiceUrl $url,
        private PendingRequest $http
    )
    {}

    public function get(int $identifier)
    {
        $this->url->setResource('/' . $identifier)
            ->build([
                'include_all_efforts' => true
            ])
        return $this->http
            ->get($this->baseUrl . '/' . $identifier . '?include_all_efforts="true"');
    }
}
