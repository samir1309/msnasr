<?php
namespace App\Validators;

use GuzzleHttp\Client;

class ReCaptcha
{
   public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new Client;
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                    [
                        'secret' => env('6LdmJ24fAAAAAB8C6E1MXdFdDtAryUvHECO1_Z-L'),
                        'response' => $value
                    ]
            ]
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}