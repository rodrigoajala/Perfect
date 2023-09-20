<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfectController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function ticketMethod(Request $request)
    {
        $requestData = $request->all();
        dd($requestData);
    }
}
