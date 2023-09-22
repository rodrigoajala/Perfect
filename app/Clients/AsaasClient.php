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

    public function generatePix(string $id): array
    {

        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->get(self::ASAAS_URL . "v3/payments/" . $id . "/pixQrCode");

        return $response->json();

    }

    public function chargeCard(string $customerCred, array $token): array
    {
        $body = [
            'customer' => $customerCred,
            'billingType' => 'CREDIT_CARD',
            'dueDate' => '2023-12-15',
            'value' => 100,
            'creditCardToken' => $token['creditCardToken']
        ];
        $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/payments', $body);
        return $response->json();
    }

    public function tokenCard(array $cardData, string $customerCardId): array
    {

        $date = explode('/', $cardData['credit_card_validity']);
       $body = [    
        'customer' => $customerCardId,
        'creditCard' => [
            'holderName' => $cardData['credit_card_holder_name'],
            'number' => $cardData['credit_card_number'],
            'expiryMonth' => $date[0],
            'expiryYear' => $date[1],
            'ccv' => $cardData['credit_card_cvv']
        ],
        'creditCardHolderInfo' =>[
            'name' => $cardData['full_name'],
            'email' => 'rodrigo@gmail.com',
            'cpfCnpj' => $cardData['cpf_cnpj'],
            'postalCode' => '89223-005',
            'addressNumber' => '277',
            'addressComplement' => null,
            'phone' => '4738010919',
            'mobilePhone' => '47998781877'
        ]
       ];
       $response = Http::withOptions(['verify' => false])->withHeaders([
            'access_token' => self::ACCESS_TOKEN,
        ])->post(self::ASAAS_URL . 'v3/creditCard/tokenize', $body);
        return $response->json();
    }
}

