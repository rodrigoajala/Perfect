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
        $data = $this->paymentService->handle($requestData);
        
    }
}
