<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class AsaasClient
{
    private const ASAAS_URL = 'https://sandbox.asaas.com/api/';
    private const ACCESS_TOKEN = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNjA2NTM6OiRhYWNoXzQwNWYwYzQ2LWI1NDAtNDcxNi05MTExLTEwMjNmYTFjZTFmMg==';

    public function createCustomer(array $customerData): array
    {
        $body = [
            'name' => $customerData['full_name'],
            'cpfCnpj' => $customerData['document']
        ];

        $response = Http::withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/customers', $body);

        return $response->json();
    }

}

