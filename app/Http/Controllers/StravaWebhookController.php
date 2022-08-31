<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return [
            'hub.challenge' => $request->input('hub_challenge')
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'Event Received';
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
