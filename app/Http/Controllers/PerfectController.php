<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfectController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function ticketMethod()
    {
        return view('ticket');
    }

    public function pix()
    {
        return view('pix');
    }

    public function creditCard()
    {
        return view('creditCard');
    }
}
