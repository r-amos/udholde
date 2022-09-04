<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StravaSubscriptionValidationRequest;

class StravaWebhookController extends Controller
{
    /**
     * Validate Callback Request
     *
     * @param App\Http\Request\StravaSubscriptionValidationRequest
     * @return \Illuminate\Http\Response
     */
    public function index(StravaSubscriptionValidationRequest $request)
    {
        Log::debug('Subscription Received');
        return [
            'hub.challenge' => $request->input('hub_challenge')
        ];
    }

    /**
     * Process A Strava Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug('Strava Event Received');
        Log::debug($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
