<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PerfectController extends Controller
{
    public function __construct(private readonly PaymentService $paymentService )
    {}

    public function welcome()
    {
        return view('welcome');
    }

    public function ticketMethod(Request $request)
    {
        

        $requestData = $request->all();
        
        // dump("dentro do controller antes de chamar o payment service");
        $data = $this->paymentService->handle($requestData);
        //dd($data);
        return view('ticket', [
            'pix' => [
                'qrCode' => $data['encodedImage'] ?? null,
                'copyPaste' => $data['payload'] ?? null
            ],
            'link' => $data['bankSlipUrl'] ?? null,
            'creditCard' => [
                'status' => $data['status']?? null,
                'type' => $data['billingType']?? null
            ]
        ]);
    }
}
