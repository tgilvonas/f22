@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Platinamas leidinys') }}</h1>
    <p>{{ __('Pasirinkite variantą, kuris labiausiai atitiks Jūsų poreikius') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_after_step_2') }}">
        @csrf
        <div class="row">
            @foreach($orderTypes as $orderType)
                <div class="col-xl-4">
                    <div class="order-type-box js-order-type-box" data-id="{{ $orderType->id }}">
                        <div class="title text-center text-uppercase font-weight-bold">
                            {{ $orderType->title }}
                        </div>
                        <div class="description text-center">
                            {{ $orderType->description }}
                        </div>
                        <div class="btn-wrapper text-center">
                            <button type="submit" class="js-select-order-type btn btn-primary text-uppercase font-weight-bold" data-id="{{ $orderType->id }}" name="order_type" value="{{ $orderType->id }}">
                                {{ __('Renkuosi') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
@endsection
