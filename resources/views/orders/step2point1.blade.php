@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Platinamas leidinys') }}</h1>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_after_step_2_point_1') }}">
        @csrf
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
                        {{ __('Pasirinkite dydį: A4 arba A5') }}*
                    </div>
                    @foreach($printFormats as $printFormat)
                        <div class="col-xl-6">
                            <button type="submit" name="print_format" value="{{ $printFormat->id }}" class="print-format-box text-center" data-id="{{ $printFormat->id }}">
                                <img src="/img/print-formats/{{ strtolower($printFormat->title).'.png' }}" alt="{{ $printFormat->title }}" style="width: 146px; height: 200px;" />
                                <div class="font-weight-bold">
                                    {{ $printFormat->measurements }}
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection
