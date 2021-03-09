<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestToStep2;
use App\Http\Requests\RequestToStep3;
use App\Models\District;
use App\Models\OrderType;
use App\Models\PrintFormat;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function step1()
    {
        session()->forget('order');
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

    public function postToStep3(RequestToStep3 $request)
    {
        session()->put('order.order_type', $request->get('order_type', null));
        session()->put('order.print_format', $request->get('print_format', null));
        return redirect()->route('orders.step3');
    }

    public function step3()
    {
        return view('orders.step3');
    }
}
