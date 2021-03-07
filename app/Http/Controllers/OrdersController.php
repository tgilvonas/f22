<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestToStep2;
use App\Models\District;
use App\Models\OrderType;
use App\Models\PrintFormat;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function step1()
    {
        return view('orders.step1', [
            'districts' => District::orderBy('name', 'asc')->get(),
        ]);
    }

    public function postToStep2(RequestToStep2 $request)
    {
        session()->put('order.districts', $request->get('districts', []));
        return redirect()->route('orders.step2');
    }

    public function step2()
    {
        return view('orders.step2', [
            'orderTypes' => OrderType::all(),
            'printFormats' => PrintFormat::all(),
        ]);
    }
}
