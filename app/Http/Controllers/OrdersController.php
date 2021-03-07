<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function step1()
    {
        return view('orders.step1', [
            'districts' => District::all(),
        ]);
    }

    public function postToStep2()
    {
        dd('Here should be order processing and redirect to step2');
    }

    public function step2()
    {

    }
}
