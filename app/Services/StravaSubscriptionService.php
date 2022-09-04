<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config; 

class StravaSubscriptionService
{
    /**
     * @var string
     */
    private string $url;

    public function __construct()
    {
        $this->url = Config::get('strava.webhook_url');
    }

    /**
     * @return array
     */
    private function getDefaultParameters()
    {
        return [
            'client_id'     => Config::get('strava.client_id'),
            'client_secret' => Config::get('strava.client_secret'),
        ];
    }

    /**
     * @return array
     */
    private function getSubscriptionParameters()
    {
        return  [
            'callback_url'  => route('strava.webhook.index'),
            'verify_token'  => Config::get('strava.verify_token')
        ];
    }

    /**
     * @return string
     */
    private function buildDefaultQueryString()
    {
        return http_build_query(
            $this->getDefaultParameters()
        );
    }
    
    /**
     * @return string
     */
    private function buildSubscriptionQueryString()
    {
        return http_build_query(
            array_merge(
                $this->getDefaultParameters(),
                $this->getSubscriptionParameters()
            )
        );
    }

    /**
     * @return Illuminate\Http\Client\Response
     */
    public function create()
    {
        return Http::post(
            $this->url.'?'.$this->buildSubscriptionQueryString()
        );
    }

    /**
     * @return Illuminate\Http\Client\Response
     */
    public function get()
    {
        return Http::get(
            $this->url.'?'.$this->buildDefaultQueryString()
        );
    }

    /**
     * @return Illuminate\Http\Client\Response
     */
    public function delete(int $identifier)
    {
        return Http::get(
            $this->url 
                . '/'
                . $identifier 
                . '?'
                . $this->buildDefaultQueryString()
        );
    } 
}
