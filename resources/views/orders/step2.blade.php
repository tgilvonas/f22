@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Platinamas leidinys') }}</h1>
    <p>{{ __('Pasirinkite variantą, kuris labiausiai atitiks Jūsų poreikius') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_to_step3') }}">
        @csrf
        <div class="d-none">
            @foreach($orderTypes as $orderType)
                <div><input type="radio" name="order_type" value="{{ $orderType->id }}" @if($orderType->id==old('order_type')) checked @endif class="js-order-type-input" /></div>
            @endforeach
        </div>
        <div class="row">
            @foreach($orderTypes as $orderType)
                <div class="col-xl-4">
                    <div class="order-type-box js-order-type-box">
                        <div class="title text-center text-uppercase font-weight-bold">
                            {{ $orderType->title }}
                        </div>
                        <div class="description text-center">
                            {{ $orderType->description }}
                        </div>
                        <div class="btn-wrapper text-center">
                            <button type="button" class="js-select-order-type btn btn-primary text-uppercase font-weight-bold" data-id="{{ $orderType->id }}">
                                {{ __('Renkuosi') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-none">
            @foreach($printFormats as $printFormat)
                <div>
                    <input type="radio" name="print_format" value="{{ $printFormat->id }}" @if($printFormat->id==old('print_format')) checked @endif class="js-print-format-input" />
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-xl-12">
                        {{ __('Pasirinkite dydį A4 arba A5') }}*
                    </div>
                    @foreach($printFormats as $printFormat)
                        <div class="col-xl-6">
                            <div class="print-format-box text-center js-print-format-box" data-id="{{ $printFormat->id }}">
                                <img src="/img/print-formats/{{ strtolower($printFormat->title).'.png' }}" alt="{{ $printFormat->title }}" style="width: 146px; height: 200px;" />
                                <div class="font-weight-bold">
                                    {{ $printFormat->measurements }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                {{ __('Toliau') }}
            </button>
        </div>
    </form>
@endsection
