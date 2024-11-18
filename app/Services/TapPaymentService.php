<?php

namespace App\Services;

use GuzzleHttp\Client;

class TapPaymentService
{
    protected $client;
    protected $apiUrl;
    protected $secretKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = config('tap.api_url');
        $this->secretKey = config('tap.secret_key');
    }

    public function createPayment(array $paymentData)
    {
        try {
            $response = $this->client->post("{$this->apiUrl}/charges", [
                'headers' => [
                    'Authorization' => "Bearer {$this->secretKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => $paymentData,
                'verify' => false, // Ignore SSL certificate
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getPaymentDetails($paymentId)
    {
        try {
            $response = $this->client->get("{$this->apiUrl}/charges/{$paymentId}", [
                'headers' => [
                    'Authorization' => "Bearer {$this->secretKey}",
                    'Content-Type' => 'application/json',
                ],
                'verify' => false, // Ignore SSL certificate
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
