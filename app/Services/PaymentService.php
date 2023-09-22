<?php

namespace App\Services;
use App\Clients\AsaasClient;

class PaymentService
{
    public function __construct(private readonly AsaasClient $asaasClient)
    {}

    public function handle(array $data)
    {
        // dump("dentro do payment service");
        $customer = $this->createCustomer($data);
        // dd($customer);

        if ($data['form_of_payment'] === 'pix') {
            return $this->pix($customer['id']);
        }

        if ($data['form_of_payment'] === 'ticket') {
            // dump("dentro do if");

            return $this->ticket($customer['id']);

        }

        if ($data['form_of_payment'] === 'creditCard') {
            return $this->creditCard();
        }

    }

    private function pix(string $customerPix): array
    {
        $retornoCobranca = $this->asaasClient->createPix($customerPix);
        return $this->asaasClient->generatePix($retornoCobranca['id']);
    }

    private function ticket(string $customerId): array
    {
        // dump("dentro do ticket");
        $retorno = $this->asaasClient->createTicket($customerId);
        // dump("processor o create ticket");
        return $retorno;
    }

    private function creditCard()
    {




    }

    private function createCustomer(array $data): array
    {
        $fullName = $data['full_name'];
        $document = $data['cpf_cnpj'];
        return $this->asaasClient->createCustomer([
            'full_name' => $fullName,
            'document' => $document
        ]);
    }
}
