<?php

namespace App\Services;

use Illuminate\Support\Facades\Config; 

class StravaServiceUrl
{
    /**
     * @var string|null
     */
    private $resource;

    /**
      * @param  string $url
     */
    public function __construct(private string $url)
    {}

    /**
     * @return array
     */
    private function getDefaultParameters()
    {
// Auth Service And The Subscription Service Needs The Defaults
// We Need An App Service Url - Requires The Client ID etc
// Athlete Service Url Just The Authenticated Bearer Token For The Athlete

        if (!$this->hasDefaultParameters) {
            return [                //
            ];
        }

        return [
            'client_id'     => Config::get('strava.client_id'),
            'client_secret' => Config::get('strava.client_secret'),
        ];
    }

    /**
     * @return string
     */
    private function buildQueryString(array $queryParameters  = [])
    {
        return http_build_query(
            array_merge(
                $this->getDefaultParameters(), 
                $queryParameters
            )
        );
    }

    /**
     * @param  string $resource
     * @return self
     */
    public function setResource(string $resource)
    {
        $this->resource = $resource;
        return $this;
    }

    private function buildBaseUrl()
    {
        if (empty($this->resource)) {
            return $this->url;
        }

        return $this->url.$this->resource;
    }
    
    /**
     * @param array $queryParameters
     * @return string
     */
    public function build(array $queryParameters = [])
    {
        return $this->buildBaseUrl()
            .'?'
            .$this->buildQueryString($queryParameters);
    }
}
