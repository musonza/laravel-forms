<?php

namespace Musonza\Form\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class ReCaptcha implements Rule
{
    public function passes($attribute, $value)
    {

        $client = new Client();

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params' =>
                [
                    'secret' => config('laravel_forms.google_recaptcha_secret'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
            ]
        );

        $body = json_decode((string) $response->getBody());

        return $body->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please ensure that you are a human!';
    }
}
