<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;

class StravaSubscriptionValidationRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Config::get('strava.verify_token') === $this->hub_verify_token;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hub_mode'         => 'required|string|in:subscribe',
            'hub_verify_token' => 'required|string',
            'hub_challenge'    => 'required|string'
        ];
    }
}
