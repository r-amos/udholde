<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StravaAuthenticationService
{
    /**
     * @param  StravaServiceUrl $url
     */
    public function __construct(private StravaServiceUrl $url)
    {}

    /**
     * @return array
     */
    private function getQueryParameters(): array
    {
        return [
            'grant_type'    => 'refresh_token',
            'refresh_token' => ''
        ];
    }

    public function refreshToken()
    {
        return Http::post(
            $this->url->build($this->getQueryParameters())
        );
    }
}
