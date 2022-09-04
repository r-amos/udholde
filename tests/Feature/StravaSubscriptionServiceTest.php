<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\StravaSubscriptionService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StravaSubscriptionServiceTest extends TestCase
{
    /**
     * @test
     * 
     * @return void
     */
    public function can_subscribe()
    {
        $service = new StravaSubscriptionService;

        $response = $service->create();

        $response->assertStatus(200);
    }
}
