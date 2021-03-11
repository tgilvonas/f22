<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAfterStep1;
use App\Http\Requests\RequestAfterStep2;
use App\Http\Requests\RequestAfterStep2Point1;
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

    public function postAfterStep1(RequestAfterStep1 $request)
    {
        session()->put('order.districts', $request->get('districts', []));
        return redirect()->route('orders.step2');
    }

    public function step2()
    {
        return view('orders.step2', [
            'orderTypes' => OrderType::all(),
        ]);
    }

    public function postAfterStep2(RequestAfterStep2 $request)
    {
        $orderType = $request->get('order_type', null);
        session()->put('order.order_type', $orderType);
        if ($orderType == 3) {
            return redirect()->route('orders.step3');
        } else {
            return redirect()->route('orders.step2_point_1');
        }
    }

    public function step2Point1()
    {
        return view('orders.step2point1', [
            'printFormats' => PrintFormat::all(),
        ]);
    }

    public function postAfterStep2Point1(RequestAfterStep2Point1 $request)
    {
        session()->put('order.print_format', $request->get('print_format', null));
        return redirect()->route('orders.step3');
    }

    public function step3()
    {
        return view('orders.step3');
    }
}
