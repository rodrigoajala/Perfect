<?php

namespace App\Services;
use App\Clients\AsaasClient;

class PaymentService
{
    public function __construct(private readonly AsaasClient $asaasClient)
    {}

    public function handle(array $data)
    {
        if ($data['form_of_payment'] === 'pix') {
            return $this->pix();
        }

        if ($data['form_of_payment'] === 'ticket') {
            return $this->ticket();
        }

        if ($data['form_of_payment'] === 'creditCard') {
            return $this->creditCard();
        }
        
    }

    private function pix()
    {
        dd('Chegou no pix');


    }

    private function ticket()
    {
        dd('Chegou no boleto');

        
    }

    private function creditCard()
    {

        dd('Chegou no CC');

        
    }
}