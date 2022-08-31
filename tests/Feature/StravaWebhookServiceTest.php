<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StravaWebhookServiceTest extends TestCase
{
    /**
     * @skip
     * 
     * @return void
     */
    public function strava_webhook_get_endpoint_exists()
    {
        $response = $this->get(route('strava.webhook.index'));

        $response->assertStatus(200);
    }

    /**
     * @test
     *
     * @return void
     */
    public function can_validate_subscription_to_strava_webhook()
    {
        $stravaVerifyToken = Config::get('strava.verify_token');
        $challenge         = Str::random(32);
        
        $route = route(
            'strava.webhook.index', 
            [
                'hub.mode'         => 'subscribe',
                'hub.verify_token' => $stravaVerifyToken,
                'hub.challenge'    => $challenge
            ]
        );

        $response = $this->get($route);

        $response->assertStatus(200);
        $response->assertJson([
            'hub.challenge' => $challenge
        ]);
    }
}
