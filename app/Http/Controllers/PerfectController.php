<?php

namespace App\Http\Controllers;

class PerfectController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function ticketMethod()
    {
        dd('Cheguei');
    }
}
