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
        return view('orders.step1');
    }

    public function getListOfDistricts()
    {
        $searchText = request()->get('search_text', '');

        $districtsQueryObject = District::orderBy('name', 'asc');

        if (!empty($searchText)) {
            $districtsQueryObject->where('name', 'like', '%'.$searchText.'%');
        }

        $idsOfSelectedDistricts = request()->get('ids_of_selected_districts', []);
        if (count($idsOfSelectedDistricts)>0) {
            $districtsQueryObject->whereNotIn('id', $idsOfSelectedDistricts);
        }

        return $districtsQueryObject->get();
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
        $priceOfOneFlyer = 0.014;

        $districts = District::whereIn('id', session()->get('order.districts'))->get();

        $sumOfAuditoriums = 0;
        $subTotalOfDistricts = 0;
        foreach ($districts as $district) {
            $sumOfAuditoriums = $sumOfAuditoriums + $district->population;
            $subTotalOfDistricts = $subTotalOfDistricts + ($priceOfOneFlyer * $district->population * $district->coefficient);
        }

        $orderType = OrderType::find(session()->get('order.order_type'));
        $orderTypeCoefficient = $orderType->coefficient ?? 1;
        $orderTypeConstantAdditive = $orderType->constant_additive ?? 0;

        $printFormat = PrintFormat::find(session()->get('order.print_format'));
        $printFormatCoefficient = $printFormat->coefficient ?? 1;

        $total = $subTotalOfDistricts * $orderTypeCoefficient * $printFormatCoefficient + $orderTypeConstantAdditive;

        return view('orders.step3', [
            'districts' => $districts->pluck('name')->toArray(),
            'sumOfAuditoriums' => $sumOfAuditoriums,
            'total' => number_format($total, 2, ',', ''),
        ]);
    }
}
