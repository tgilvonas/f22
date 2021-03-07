@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Platinamas leidinys') }}</h1>
    <p>{{ __('Pasirinkite variantą, kuris labiausiai atitiks Jūsų poreikius') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_to_step2') }}">
        @csrf
        <div>
            @foreach($orderTypes as $orderType)
                <div><input type="radio" name="order_type" value="{{ $orderType->id }}" /></div>
            @endforeach
        </div>
        <div class="row">
            @foreach($orderTypes as $orderType)
                <div class="col-xl-4">
                    <div class="print-type-box">
                        <div class="title text-center text-uppercase font-weight-bold">
                            {{ $orderType->title }}
                        </div>
                        <div class="description text-center">
                            {{ $orderType->description }}
                        </div>
                        <div class="btn-wrapper text-center">
                            <button type="button" class="js-select-print_type btn btn-primary text-uppercase">{{ __('Renkuosi') }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            @foreach($printFormats as $printFormat)
                <div><input type="radio" name="print_format" value="{{ $printFormat->id }}" /></div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="row">
                    @foreach($printFormats as $printFormat)
                        <div class="col-xl-6">{{ $printFormat->measurements }}</div>
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
