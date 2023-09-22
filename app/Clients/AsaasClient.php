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

        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/customers', $body);

        return $response->json();
    }

    public function createTicket(string $customerId): array
    {
        // dump("dentro do Asaas Client - create Ticket");
        $body = [
            'customer' => $customerId,
            'billingType' => 'BOLETO',
            'dueDate' => '2023-12-15',
            'value' => 100           
        ];

        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/payments', $body);

        // dump("processou o createTicket na Asaas");

        return $response->json();
    }

    public function createPix(string $custumerPixId)
    {
        $body = [
            'customer' => $custumerPixId,
            'billingType' => 'PIX',
            'dueDate' => '2023-12-15',
            'value' => 100

        ];
        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/payments', $body);
        

        return $response->json();

    }

    public function generatePix(string $id)
    {

        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->get(self::ASAAS_URL . "v3/payments/" . "$id" . "/pixQrCode");



    }
    

}

