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
        // dd($data);
        return view('ticket', [

            'link' => $data['bankSlipUrl']
        ]);
    }
}
